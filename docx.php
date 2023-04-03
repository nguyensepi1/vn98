<?php
class DocxConversion{
    private $filename;

    public function __construct($filePath) {
        $this->filename = $filePath;
    }

    private function read_doc() {
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }

    private function read_docx(){

        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content, '');

        return $striped_content;
        // return $content;
    }

    /************************excel sheet************************************/

    function xlsx_to_text($input_file){
        $xml_filename = "xl/sharedStrings.xml"; //content file name
        $zip_handle = new ZipArchive;
        $output_text = "";
        if(true === $zip_handle->open($input_file)){
            if(($xml_index = $zip_handle->locateName($xml_filename)) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                $output_text = strip_tags($xml_handle->saveXML());
            }else{
                $output_text .="";
            }
            $zip_handle->close();
        }else{
        $output_text .="";
        }
        return $output_text;
    }

    /*************************power point files*****************************/
    function pptx_to_text($input_file){
        $zip_handle = new ZipArchive;
        $output_text = "";
        if(true === $zip_handle->open($input_file)){
            $slide_number = 1; //loop through slide files
            while(($xml_index = $zip_handle->locateName("ppt/slides/slide".$slide_number.".xml")) !== false){
                $xml_datas = $zip_handle->getFromIndex($xml_index);
                $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
                $output_text .= strip_tags($xml_handle->saveXML());
                $slide_number++;
            }
            if($slide_number == 1){
                $output_text .="";
            }
            $zip_handle->close();
        }else{
        $output_text .="";
        }
        return $output_text;
    }


    public function convertToText() {

        if(isset($this->filename) && !file_exists($this->filename)) {
            return "File Not exists";
        }

        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "doc" || $file_ext == "docx" || $file_ext == "xlsx" || $file_ext == "pptx")
        {
            if($file_ext == "doc") {
                return $this->read_doc();
            } elseif($file_ext == "docx") {
                return $this->read_docx();
            } elseif($file_ext == "xlsx") {
                return $this->xlsx_to_text();
            }elseif($file_ext == "pptx") {
                return $this->pptx_to_text();
            }
        } else {
            return "Invalid File Type";
        }
    }

}
$docObj = new DocxConversion("uploads/".$_GET['id']."/Chương ".$_GET['chap'].".docx");
// $docObj = new DocxConversion("test.doc");
//$docObj = new DocxConversion("test.xlsx");
//$docObj = new DocxConversion("test.pptx");
$id = $_GET['id'];
echo '<form action="createdocx/word.php?id='.$_GET['id'].'&chap='.$_GET['chap'].'" method="post" style="width: 100%">
    <a style="display: flex; align-items: center;" onclick="detail(';
echo "'$id'";
echo ')"><img src="img/right-arrow.webp" style="width: 20px; margin-right: 12px;">'.$_GET['name'].' - Chương '.$_GET['chap'].'</a>
    <div style="justify-content: space-between; display: flex; width: 100%">
        <a style="cursor:pointer;color: #f13b59; font-weight: 600" onclick="openFile('.($_GET['chap'] - 1).')">
            Chương trước
        </a> 
        <div>Chuyển đến chương: 
            <input type="number" value="'.$_GET['chap'].'" style="width: 80px;border-radius: 10px;padding: 0 4px;border: 1px solid #f37489;"> 
            <button style="border-radius: 5px;border: 1px solid #f37489;background: #f37489;padding: 0 4px;cursor: pointer;" onclick="openFile(this.parentElement.children[0].value)">GO!</button>
        </div>
        <a style="cursor:pointer;color: #f13b59; font-weight: 600" onclick="openFile('.($_GET['chap'] + 1).')">
            Chương sau
        </a> 
    </div>
    <textarea name="editor" id="editor" onkeypress="countWords(this.value)">'.$docText= $docObj->convertToText().'</textarea>
    <div id="count"></div>
    <input type="submit" name="submit" style="background-color: #f18497; color: #fff; padding: 8px 16px; margin-top: 8px; border-radius: 5px; border: none; cursor: pointer; height: fit-content;" value="Lưu">
    </form>';

?>
<style>
textarea {
    display: block;
    width: 100%;
    height: 560px;
    border: 1px solid #f37489;
    border-radius: 10px;
    padding: 12px;
    outline: none;
}

textarea::selection {
  background: #f5c1ca;
  color: #ff0000;
}
</style>

<script>
    strr = document.getElementById('editor').value
    countWords(strr)
    function countWords(str) {
        str = str.replace(/(^\s*)|(\s*$)/gi,"");
        str = str.replace(/[ ]{2,}/gi," ");
        str = str.replace(/\r\n /," ");
        lines = (str.match(/\n/g) || '').length + 1
        console.log(str);
        document.getElementById('count').innerText = str.split(' ').length + lines;
    }
</script>
