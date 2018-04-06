<?php
/**
 * Created by PhpStorm.
 * User: Matt
 * Date: 4/4/2018
 * Time: 2:17 PM
 */
function Load_Portfolio_Piece($file,$num,$title)
{
    echo "<div class='col-sm-4 portfolio-item'>
    <a href='#portfolioModal{$num}' class='portfolio-link' data-toggle='modal' data-tooltip='tooltip' title='{$title}'>
        <div class='caption'>
            <div class='caption-content'>
                <i class='fa fa-search-plus fa-3x'></i>
            </div>
        </div>
        <img src='../../img/portfolio/{$file}' class='img-responsive' alt=''>
    </a>
</div>";


    
}

function Load_Portfolio_Piece_Modal($file,$num,$title,$description,$link,$client,$clientLink,$date,$service) {
    echo "<div class='portfolio-modal modal fade' id='portfolioModal{$num}' tabindex='-1' role='dialog' aria-hidden='true'>
        <div class='modal-content'>
            <div class='close-modal' data-dismiss='modal'>
                <div class='lr'>
                    <div class='rl'>
                    </div>
                </div>
            </div>
            <div class='container'>
                <div class='row'>
                    <div class='col-lg-8 col-lg-offset-2'>
                        <div class='modal-body'>
                            <h2>{$title}</h2>
                            <hr class='star-primary'>
                            <a href='{$link}'>
                                <img src='../../img/portfolio/{$file}' class='img-responsive img-centered' alt=''>
                            </a>
                            
                            <p>{$description}</p>
                            <ul class='list-inline item-details'>
                                <li>Client:
                                    <strong><a href='$clientLink'>{$client}</a>
                                    </strong>
                                </li>
                                <li>Date:
                                    <strong><a href='{$link}'>{$date}</a>
                                    </strong>
                                </li>
                                <li>Service:
                                    <strong><a href='{$link}'>{$service}</a>
                                    </strong>
                                </li>
                            </ul>
                            <button type='button' class='btn btn-default' data-dismiss='modal'><i class='fa fa-times'></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
}

?>
