<?php include_once 'ViewDescriptor.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>FFstory &bull; Tutto su Final Fantasy e Kingdom Hearts</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/global.css" />
        <link rel="stylesheet" type="text/css" href="./assets/css/menu-orizzontale.css" />
        <link rel="apple-touch-icon" href="./assets/img/icon/ffstory-72x72.png" sizes="72x72" />
        <link rel="apple-touch-icon" href="./assets/img/icon/ffstory-114x114.png" sizes="114x114" />
        <link rel="icon" href="./assets/img/icon/ffstory-475x475.png" />
        <link rel="shortcut icon" href="./assets/img/icon/ffstory-475x475.png" />
        <script type="text/javascript" src="./assets/js/jquery-1.9.1.min.js"></script>

            <script type="text/javascript">
                $(document).ready(function() { 
                    $('#menu_css_orizzontale').hide().delay(200).fadeIn(900);
                    $('#big-content').hide().delay(600).fadeIn(900); 
                } );   
            </script>
        
    </head>
        

 <body> 
    <div class="content">
        <div style="float:left; width:500px;">
            <a href="/"><img src="./assets/img/ffstory-logo.png" class="logo"/></a>
        </div> 
        <ul id="menu_css_orizzontale">
            <li><a href="index.php?page=home" <? if($_GET['page'] == 'home') echo'class="active"'; ?> >Home</a></li>
            <li><a href="index.php?page=about" <? if($_GET['page'] == 'about') echo'class="active"'; ?> >About</a></li>

        </ul>
    </div>

    <div class="white-c" id="big-content">
        <div class="lateral-menu">  
            <h1 class="h1m30">Amministrazione</h1>
            <div id='cssmenu' style="margin-top:20px;">
                <ul>
                   <li><a href=''><span>Aggiungi</span></a></li>
                   <li><a href=''><span>Elimina</span></a></li>
                   <li><a href=''><span>Logout</span></a></li>
                </ul>
            </div>
        </div>
        
        <div class="main-content">
            <h1>Le frasi più belle di Final Fantasy</h1>
            <form style="margin:20px 0 20px 0;">
            <select id="chapters">
                <?php foreach($capitoli as $capitolo) : ?>
                    <option value="<?php echo $capitolo['IdCapitolo']; ?>"><?php echo $capitolo['NomeCapitolo']; ?></option>
                <?php endforeach; ?>
            </select>
            
            <select id="heroes"></select>
            
            <input type="button" name="filter" id="filter" value="Cerca" class="btn"/>
            
            <br clear="all" />

            <table id="quotes" class="table table-striped">
            </table>
            <script type="text/javascript">
                $(document).ready
                (
                    function()
                    {
                        $('select[id="chapters"]').change
                        (
                            function()
                            {
                                $.ajax
                                (
                                    {
                                        type: 'POST',
                                        url:  'inc/update-heroes.php',
                                        data: {'idCapitolo': $('select[id="chapters"]').val()},
                                        success: function(data, textStatus, jqXHR) { console.debug(data); $('select[id="heroes"]').html(data); }
                                    }
                                );
                            }
                        );
                        
                        $('input[id="filter"]').click
                        (
                            function()
                            {
                                $.ajax
                                (
                                    {
                                        type: 'POST',
                                        url:  'inc/update-quotes.php',
                                        data: {'idEroe': $('select[id="heroes"]').val()},
                                        success: function(data, textStatus, jqXHR) { $('table[id="quotes"]').html(data) }
                                    }
                                );
                            }
                        );
                    }
                );
            </script>
            </form>
            <p><small>Versione 2.0</small></p>   
            
        </div>            
    </div>

<a href="#" class="scrollup">Torna su!</a>

</body>
    </html>





