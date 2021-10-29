<?php
session_start();

class Website
{
    private $head;
    private $body;
    private $foot;

    public function __construct($title)
    {

        $this->head = '<!DOCTYPE html>
            <html lang="de">
                <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="stylesheet" href="https://start.gcm.schule/backend/public/aurora.css">

    <title>'.$title.'</title>
  </head><body>';

        $this->foot = "
</body></html>";

        $this->body = "";
    }

    public function getHtml()
    {
        return $this->head . $this->body . $this->foot;
    }

    public function controler(){
        $this->body .= '<div class="cis-header"><div class=cis-brand>CIS Slides Generator</div><form class="cis-header-search" action="https://ecosia.org/search" method="GET"><input class="cis-search-input" type="text" name="q" placeholder="Umweltfreundlich Suchen" required="" autocomplete="off"><button class="cis-search-button" type="submit"><svg viewBox="-2 -2 20 20" height="0"><path d="M6,0A6,6 0 01 6,12 6,6 0 01 6,0zM10.25,10.25L16,16" fill="none" stroke="#ddd" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"/></svg></button></form></div>';
        if(isset($_POST['restart']))
        {
            session_destroy();
            session_start();
        }
        if(isset($_SESSION['slidesName']))
        {
            $this->body .= '<div class="cis-single-wrapper"><div class="cis-block">';
            $this->showInformation();
        }
        elseif(isset($_POST['slidesContent']))
        {
             $this->body .= '<div class="cis-single-wrapper"><div class="cis-block">';
             $this->body .= '<h1>Markdown gespeichert</h1>';
             $_SESSION['slidesName'] = date('Y-m-d').'_'.random_int(1, 999);
             $this->renderSlides();
             $this->showInformation();
        }
        else{
            $this->body .= '
            <div class="cis-single-wrapper">
              <div class="cis-block">
                <h2>Hier einfach den Markdown-Code hinein kopieren:</h2>
                <form class="cis-form" method=POST action="">
                  <textarea name=slidesContent cols=80 rows=20></textarea>
                  <input type=submit class="cisui-button" value="Code absenden">
                </form>
              </div>
            </div>
            ';
        }
    }
    private function showInformation()
    {
            $this->body .= '<p>Die Slides wurden hier gespeichert:
  <a href="'.$_SESSION['slidesName'].'.html" target="_blank">Link zu den Slides (öffnet in neuem Tab)</a></p>
                <form class="cis-form" method=POST action="">
            <input type=submit value="Neue Slides beginnen" name="restart" class="cisui-button">
            </form></div></div>
            ';
    }
    private function renderSlides()
    {
        $html = '

        <!doctype html>
            <html>
	            <head>
		            <meta charset="utf-8">
		            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		            <title>'.$_SESSION['slidesName'].'</title>

		            <link rel="stylesheet" href="dist/reset.css">
		            <link rel="stylesheet" href="dist/reveal.css">
		            <link rel="stylesheet" href="dist/theme/black.css">

		            <!-- Theme used for syntax highlighted code -->
		            <link rel="stylesheet" href="plugin/highlight/monokai.css">
	            </head>
	            <body>
		            <div class="reveal">
			            <div class="slides">
                            <section id="sec01" data-markdown>
                            '.$_POST['slidesContent'].'
                            </section>
                        </div>
		            </div>

		            <script src="dist/reveal.js"></script>
		            <script src="plugin/notes/notes.js"></script>
		            <script src="plugin/markdown/markdown.js"></script>
		            <script src="plugin/highlight/highlight.js"></script>
		            <script>
			            // More info about initialization & config:
			            // - https://revealjs.com/initialization/
			            // - https://revealjs.com/config/
			            Reveal.initialize({
				            hash: true,

				            // Learn about plugins: https://revealjs.com/plugins/
				            plugins: [ RevealMarkdown, RevealHighlight, RevealNotes ]
			            });
		            </script>
	            </body>
            </html>

        ';

         $handle = fopen($_SESSION['slidesName'].'.html', 'a');
         fwrite($handle, $html);
         fclose($handle);
    }

    //HAVE TO TIDY UP EVERYTHING AFTER THIS LINE


    public function test()
    {
        $filename = $_POST['testobject'].'.csv';

        if($_POST['api'] === 'secretAPIkey'){

            $record = $_POST['record'];

            $time =  $date = date('Y-m-d_H:i:s ', time());


            $handle = fopen($filename, 'a');

            $line = $time.','.$record.PHP_EOL;

            fwrite($handle, $line);

            fclose($handle);


        }
        elseif($_SESSION['login'] === TRUE or $_GET['field'] === 'login_key')
        {
            $_SESSION['login'] = TRUE;
            $content = '';
            $verzeichnis = ".";
            $content .= "<ol>";


            if ( is_dir ( $verzeichnis )){
                if ( $handle = opendir($verzeichnis) ){
                    while (($file = readdir($handle)) !== false){
                        if (filetype( $file ) =='file' and pathinfo($file)['extension']=='csv'){
                            $content .= "<li>";
                            $content .= '
                                        <a href="./'.$file.'" target="_blank">'
                                            .$file.'
                                        </a>
                                            size: '.(filesize($file)/1024).'
                                            kB, last update: '.date(DATE_RFC822, stat($file)['mtime'])."
                                        </li>\n";
                        }
                    }
                    closedir($handle);
                }
            }
            $content .= "</ol>";

            $this->body.='
            <style>
                .wrap { background: slateblue; }
                .spalte-1 { float: left; width: 49%; background: black; padding: 1em;}
                .spalte-2 { float: left; width: 1%; background: black; }
                .spalte-3 { float: left; width: 49%; background: grey; }
                body {
                    background-color: black;
                    color: lightgreen;
                }
            </style>
            <div class="wrap">
                <div class="spalte-1">
                <h1>LTE-Test</h1>
                 Diese Seite sammelt CSV-Daten eines automatisierten LTE-Testes.
                ';


            $this->body.='</div>

                <div class="spalte-3">
                    '.$content.'
                </div>

            </div>

            ';

        }
        else{

            $this->body .= "<form method='GET'>
            <input name='field' type='password'>
            <br>
            <input type='submit' value='Login'>
            </form>" ;
        }

    }
}
$mySite = new Website("nicht ltetest");

//$mySite->test();

$mySite->controler();

echo $mySite->getHtml();

?>
