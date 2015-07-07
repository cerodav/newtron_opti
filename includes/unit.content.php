<?php

$folder=$_GET['page'];
switch($folder)
	{
		case 'basicprogrammingandtheory':
			$title='Basic Programming And Theory';
			break;
		case 'machinelearning':
			$title='Machine Learning';
			break;
		case 'neuralnetworks':
			$title='Neural Networks';
			break;
		case 'deeplearning':
			$title='Deep Learning';
			break;
		default:
			break;
	}
if(isset($title))
{
	$dir="./study/".$folder;
	$dh=scandir($dir);

	$add_content="";
	foreach($dh as $k=>$chapter)
	{
	    if($k>1)
	    {
	    	$chapter=str_replace(".php", "", $chapter);
	    	$extra="<div class='col-lg-4 col-md-6 text-center' ><div class='service-box'><i class='fa fa-4x fa-diamond wow bounceIn text-primary'></i><a href='./lesson.php?unit=".$folder."&chapter=".$chapter."'><h3>".$chapter."</h3></a></div></div>";
	    	$add_content=$add_content.$extra;
	    }
	}
	$add_content=$add_content."</br></br></br>";

	$content=<<<EOT
	<header>
        <div class="header-content">
            <div class="header-content-inner">
                <h2>Deep Learning <br> Artificial Intelligence</h2>
                <hr>
                <p>
                <h3>The smart artificial intelligence revolution.<br>
                Explore software that can recognize patterns <br>
                 of sounds, images and data
                </p></h3>
                <a href="#" class="btn btn-primary btn-xl page-scroll">UNIT: {$title}</a>
            </div>
        </div>
    </header>
    {$add_content}

EOT;
	    
	    
	    

}

?>