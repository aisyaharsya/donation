<?php
//Get the page's HTML source using file_get_contents.
$html = file_get_contents('https://galangdana.aguspramono.com');
 
//Instantiate the DOMDocument class.
$htmlDom = new DOMDocument;
 
//Parse the HTML of the page using DOMDocument::loadHTML
@$htmlDom->loadHTML($html);
 
//Extract the links from the HTML.
$links = $htmlDom->getElementsByTagName('a');
 
//Array that will contain our extracted links.
$extractedLinks = array();
 
//Loop through the DOMNodeList.
//We can do this because the DOMNodeList object is traversable.
foreach($links as $link){
 
    //Get the link text.
    $linkText = $link->nodeValue;
    //Get the link in the href attribute.
    $linkHref = $link->getAttribute('href');
 
    //If the link is empty, skip it and don't
    //add it to our $extractedLinks array
    if(strlen(trim($linkHref)) == 0){
        continue;
    }
 
    //Skip if it is a hashtag / anchor link.
    if($linkHref[0] == '#'){
        continue;
    }
 
    //Add the link to our $extractedLinks array.
    $extractedLinks[] = array(
        'text' => $linkText,
        'href' => $linkHref
    );
 
}
 
//var_dump the array for example purposes
var_dump($extractedLinks);
?>

