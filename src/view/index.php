<?php

use Atdhe\Tvshowsapi\App\ShowSearch;

require_once("../../vendor/autoload.php");

if(!empty($_GET['search'])) {
    
    $objSearchAPI = new ShowSearch();
    $result = $objSearchAPI->getShowFromAPI($_GET['search']);
    if(empty($result['tvShow']['name'])) {
        $result = '<div class="no-show"><b class="accent-color">' . $_GET['search'] . '</b> was not found :(</div>';
    }
    

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TV Shows Air Dates</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="top-bar">
        
        <form action="" class="form">
            <input type="text" name="search" placeholder="Search by show name">
            <button type="submit">Search</button>
        </form>

    </div>

    <?php if(!empty($result['tvShow']['name'])) { ?>

        <div class="slider-ctn">

            <div class="slider-inner-ctn">

                <div class="show-cover">
                <?php 

                    $image = $result['tvShow']['image_path'] ? $result['tvShow']['image_path'] : '';
                    if(!empty($image)) {
                        echo '<img src="'.$image.'" alt="" /><br>';
                    }

                ?>

                </div>

                <div id="slideshow">

                    <?php 

                        foreach($result['tvShow']['pictures'] as $key => $item) {

                            echo '<div><img src="'. $item .'" alt="'. $result['tvShow']['name'] .'" title="'. $result['tvShow']['name']. '" /></div>';

                        }

                    ?>

                </div>

                <div class="air-date-ctn">
                    <p class="accent-color"><?php echo $result['tvShow']['name']; ?></p>
                    <p>
                        <?php

                            //$air_date = $result['tvShow']['countdown']['air_date'] ? $result['tvShow']['countdown']['air_date'] : 'N/A';
                            if(isset($result['tvShow']['countdown']['air_date'])) {
                                $airs_on = new DateTime($result['tvShow']['countdown']['air_date']);

                                echo 'Next Episode Airs: ' . $airs_on->format('d F Y H:i');
                            } else {
                                echo 'Next Episode Airs: TBA';
                            }
                        ?>
                    </p>
                    <p>
                        Episode Name:
                        <?php 
                        
                            $newestEpisode = [];
                            $episodes = $result['tvShow']['episodes'];
                            foreach($episodes as $episode) {
                                $newestEpisode[] = $episode['name'];
                            }
                            
                            echo end($newestEpisode);
                        
                        ?>

                    </p>
                </div>

                <div class="show-info">

                    <div class="info-box">
                        <p>Status</p>
                        <?php

                            if($result['tvShow']['status'] == 'Running') {
                                echo '<p class="accent-color">'.$result['tvShow']['status'].'</p>';
                            } 
                             
                            if($result['tvShow']['status'] != 'Running'){
                                echo '<p>'.$result['tvShow']['status'].'</p>';
                            }

                        ?>
                        
                    </div>

                    <div class="info-box">
                        <p>Network</p>
                        <p><?php echo $result['tvShow']['network']; ?></p>
                    </div>

                    <div class="info-box">
                        <p>Country</p>
                        <p><?php echo $result['tvShow']['country']; ?></p>
                    </div>

                    <div class="info-box">
                        <p>Genre</p>
                        <p>
                            <?php 

                                foreach( $result['tvShow']['genres'] as $genre) {
                                    echo $genre . ', '; 
                                }
                                
                            ?>
                        </p>
                    </div>

                </div>

                <div class="show-description">
                    <b>Description:</b><br>   
                    <?php echo $result['tvShow']['description']; ?>
                </div>

            </div>



        </div>

        <?php } else {

            echo !empty($result) ? $result : "";

        }

        ?>

    <script>
        $(document).ready(function() {

            $("#slideshow > div:gt(0)").hide();

            setInterval(function() { 
            $('#slideshow > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('#slideshow');
            }, 3000);

        });
    </script>
</body>
</html>