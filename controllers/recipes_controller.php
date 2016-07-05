<?php
  class RecipesController {
    public function index() {
      // we store all the recipes in a variable
      $recipes = Recipe::all();
      require_once('views/recipes/index.php');
    }

    public function show() {
      // we expect a url of form ?controller=recipes&action=show&id=x
      // without an id we just redirect to the error page as we need the recipe id to find it in the database
      if (!isset($_GET['receptID']))
        return call('pages', 'error');

      // we use the given id to get the right recipe
      $recipe = Recipe::find($_GET['receptID']);
      require_once('views/recipes/show.php');
    }
  }
?>
