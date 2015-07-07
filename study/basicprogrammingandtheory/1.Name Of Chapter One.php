<?php

$unit=$_GET['unit'];
switch($unit)
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
                <a href="#" class="btn btn-primary btn-xl page-scroll">CHAPTER: {$chapter}</a>
            </div>
        </div>
    </header>
EOT;
?>