<?

require 'scraperwiki.php';
// require 'scraperwiki/simple_html_dom.php';

$apikey = getenv('MORPH_API_KEY');
$key=$apikey;
$query="select * from 'data'";

$success=0;


$url = "https://api.morph.io/lowndsy/PA-v7/data.json";
$response=file_get_contents($url.'?key='.$key.'&query='.urlencode($query));
$js=json_decode($response,true);
echo count($js)." - ";
foreach ($js as $line)
{
scraperwiki::save(array('prikey'), $line);
$success++; 
}
unset($js);
echo $success.". 
";

echo 'Complete';
?>
