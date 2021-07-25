<!doctype html>
<html lang="en">
   <head>
      <style>

         @import url('https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,700;1,400&display=swap');

         html,body,ul,li {
            margin: 0;
            padding: 0;
         }

         html {
            font-size: 18px;
            font-family: "open sans";
         }

         body {
            font-size: 1rem;
         }

         form {
            margin: 0 auto;
            width: 75%;
         }

         fieldset {
            display: flex;
            align-items: top;
            justify-content: space-between;
            padding: 1rem;
            border: 2px solid;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
         }

         fieldset * {
            width: 80%;
         }
         fieldset label {
            width: 20%;
         }

         li {
            list-style: none;
            text-transform: capitalize;
         }

      </style>
      <title>Page types</title>
   </head>
   <body>
      <header>
         <h1>CMS: Create new page</h1>
      </header>

      <form method="POST">
         <?php foreach( $page->fields as $field_name => $props ): ?>
            <?php if( ($props->protected ?? false) || ($props->readonly ?? false) ) continue; ?>
            <fieldset>
               <label for="field_<?= $field_name ?>"><?= $field_name ?></label>
               <?php switch( $props->type ):
                  case 'string': ?>
                     <input
                        type="text" 
                        <?= isset($props->length) ? 'maxlength='.$props->length : '' ?> 
                        name="<?= $field_name ?>" 
                        id="field_<?= $field_name ?>"
                        <?= isset($props->default) ? '' : 'required' ?>
                     />
                  <?php break; 
                  case 'text': ?>
                     <textarea
                        name="<?= $field_name ?>" 
                        id="field_<?= $field_name ?>"
                        rows="30"
                        <?= isset($props->default) ? '' : 'required' ?>
                     ></textarea>
                  <?php break; ?>
               <?php endswitch; ?>
            </fieldset>

         <?php endforeach; ?>
         <button>Save</button>
      </form>
   </body>
</html>