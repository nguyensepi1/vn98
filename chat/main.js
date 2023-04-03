
let apiKey = '';

let messages = [];

function init() {

  inputField.addEventListener('keyup', (e) => {
    if (e.keyCode === 13) {
      handle_QUERY();
    }
  });
  submitBtn.addEventListener('click', () => handle_QUERY());
}

function handle_QUERY() {
  if (action.value == 'chat') { require = '' }
  else if (action.value == 'trans') { require = 'Dịch đoạn tiểu thuyết này sang tiếng Việt\n' }

  const div = document.createElement('div');
  div.classList.add('item');
  const div3 = document.createElement('div');
  const div2 = document.createElement('div');
  div2.classList.add('message');
  div2.classList.add('user');
  div2.innerHTML = inputField.value;
  div.appendChild(div3);
  div.appendChild(div2);
  results.appendChild(div);
    
  results.scrollTop = results.scrollHeight;

  messages.push({
    'role': 'user',
    'content': require + inputField.value
  })

  inputField.value = ''

  fetch(`https://api.openai.com/v1/chat/completions`, {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': `Bearer ${apiKey}`
    },
    body: JSON.stringify({
      model: 'gpt-3.5-turbo',
      messages 
    })
  })
  .then(response => response.json())
  .then(data => {

    messages.push({
      'role': 'assistant',
      'content': data.choices[0].message.content 
    });

    const div = document.createElement('div');
    div.classList.add('item');
    const div2 = document.createElement('div');
    div2.classList.add('message');
    div2.classList.add('bot');
    div2.innerHTML = data.choices[0].message.content;
    div.appendChild(div2);
    results.appendChild(div);
    speech.text = data.choices[0].message.content;
    window.speechSynthesis.speak(speech);
    //scroll to bottom of results
    results.scrollTop = results.scrollHeight;
  });

}

fetch('./config.json')
  .then(response => response.json())
  .then(data => {
    apiKey = data.apiKey;
    init();
  });

// Voice
let speech = new SpeechSynthesisUtterance();

window.speechSynthesis.onvoiceschanged = () => {
    voices = window.speechSynthesis.getVoices();
    speech.voice = voices[301];
    // let voiceSelect = document.querySelector("#voices");
};

speech.rate = 1;
speech.volume = 1;
speech.pitch = 1;

// document.querySelector("#voices").addEventListener("change", () => {
//     speech.voice = voices[document.querySelector("#voices").value];
// });

// document.querySelector("#start").addEventListener("click", () => {
//     speech.text = document.querySelector("textarea").value;
//     window.speechSynthesis.speak(speech);
// });