<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful

 require 'scraperwiki.php';
 require 'scraperwiki/simple_html_dom.php';
//
// // Read in a page
// $html = scraperwiki::scrape("http://foo.com");
//
// // Find something on the page using css selectors
// $dom = new simple_html_dom();
// $dom->load($html);
// print_r($dom->find("table.list"));
//
// // Write out to the sqlite database using scraperwiki library

//




// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

$apikey = getenv('MORPH_API_KEY');
$key=$apikey;
$query="select * from 'data' limit 10";

$url = "https://api.morph.io/lowndsy/PA-v7/data.json";
$response=file_get_contents($url.'?key='.$key.'&query='.urlencode($query));
$js=json_decode($response,true);

foreach ($js as $line)
{
 print_r($line);
 scraperwiki::save(array('prikey'), $line);
}
?>
