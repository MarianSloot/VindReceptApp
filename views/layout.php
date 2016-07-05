<!doctype html>
<html class="no-js" lang="">
    <head>
    </head>
    <body>
        <header>
          <a href='/ReceptApp'>Home</a>   <!--the name of my folder under www/ in WAMP  -->
          <a href='?controller=recipes&action=index'>Recipes</a>
        <style>
          table {
            width: 100%;
            border-collapse: collapse;
          }
          table, td, th {
            border: 1px solid black;
            padding: 5px;
            /*visibility: hidden;  */
          }
          th {text-align: left;}
          </style>
        </header>

        <?php require_once('routes.php'); ?>


        <footer>
          Copyright
        </footer>


    </body>
</html>
