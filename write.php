<?php

    session_start();
    include "UI_include.php";
    include INC_DIR."/process/p-write.php";
    include INC_DIR.'header.html';

?>
    
    <body>        
        <script>
            $(function(){
            setTimeout(function() {
                $('#error').fadeOut();
            }, 3000); 

            });
        </script>    
		<div id="container">
            <h1>Nouvel Article</h1>
            <form method="post" action="">                 
                <div id = "inputtitle">
                    <input id = "txttitle" type="text" name="title" placeholder="Enter Title" autofocus
                        <?php if ($msg != "Message saved successfully") $h->keepValues($title, 'textbox'); ?>
                    >                   
                </div>
                <div id="message">
                    <textarea name = "post"
                        <?php  if ($msg != "Message saved successfully") $h->keepValues($post, 'textarea'); ?>
                    ></textarea>
                    <script>CKEDITOR.replace('post', {height: 500});
                    </script>                    
                </div>
                <div id = "error" class="error">Message d'erreur</div>
                <div id="submit-section">        
                    <input id = "postsubmit" class="btn btn-primary" type="submit" name="submit" value="Send" />
                    <select id = "postoptions1" class = "custom-select" name = "category">
                        <option value = ''>Catégorie: </option>
                        <option value = 'Développement Web'
                            <?php if ($msg != "Message saved successfully") $h->keepValues($category, 'select', 'Développement Web'); ?>
                        >
                            Développement Web
                        </option>
                        <option value = 'Data Science'
                            <?php if ($msg != "Message saved successfully") $h->keepValues($category, 'select', 'Data Science'); ?>
                        >
                            Data Science
                        </option>
                        <option value = 'Machine Learning'
                            <?php if ($msg != "Message saved successfully") $h->keepValues($category, 'select', 'Machine Learning'); ?>
                        >
                            Machine Learning
                        </option>
                        <option value = 'Intelligence Artificielle'
                            <?php if ($msg != "Message saved successfully") $h->keepValues($category, 'select', 'Intelligence Artificielle'); ?>
                        >
                            Intelligence Artificielle
                        </option>           
                    </select>                    
                    <select id = "postoptions2" class = "custom-select" name = "audience">
                        <option value = ''>Accessible au: </option>
                        <option value = '1'
                            <?php if ($msg != "Message saved successfully") $h->keepValues($audience, 'select', '1'); ?>
                        >
                            Public
                        </option>
                        <option value = '2'
                            <?php if ($msg != "Message saved successfully") $h->keepValues($audience, 'select', '2'); ?>
                        >
                            Membres Uniquement
                        </option>           
                    </select>                                        
                </div>                
            </form>                
		</div>
        <div id = 'postlogout'>
            <a href = "logout.php?admin=1">Déconnexion</a> | 
            <a href = "read.php" target="_blank">Articles</a>            
        </div>        

	</body>
</html>