<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup templates
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix <?php if($page){ print 'col-lg-7';}?>"<?php print $attributes; ?>>
  <?php if ((!$page && !empty($title)) || !empty($title_prefix) || !empty($title_suffix) || $display_submitted): ?>
  <header>

    <?php print render($title_prefix); ?>
    <?php if (!$page && !empty($title)): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php if ($display_submitted): ?>
    <span class="submitted">
      <?php print $user_picture; ?>
      <?php print $submitted; ?>
    </span>
    <?php endif; ?>
  </header>
  <?php endif; ?>
  <?php
    // Hide comments, tags, and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    hide($content['field_tags']);
    print render($content);
  ?>
  <?php if (!empty($content['field_tags']) || !empty($content['links'])): ?>
  <footer>
    <?php print render($content['field_tags']); ?>
    <?php //print render($content['links']); ?>
  </footer>
  <?php endif; ?>
  <?php //print render($content['comments']); ?>
<?php if($page):?>
  <div class ="col-lg-12 related-groups">
  <div id="title">
    <span>Grupos</span>
  </div>
  
  <?php

        $lan    = $node->language;
        $nid    = $node->nid;        
        $query  = 

          " SELECT n.title,n.nid, b.body_value
            FROM  node n,
                  field_data_field_id_grupo i,
                  field_data_body b
            WHERE n.nid = i.entity_id 
                  AND
                  n.nid=b.entity_id
                  AND
                  i.field_id_grupo_tid in (

              SELECT t1.tid
              FROM  node n1, 
                    field_data_field_grupos_relacionados g1, 
                    taxonomy_term_data t1
              WHERE n1.nid=".$nid."
                    AND
                    n1.nid=g1.entity_id 
                    AND 
                    g1.field_grupos_relacionados_tid = t1.tid) AND n.language = '".$lan."'";
                    
        
        $result=db_query($query);
        foreach ($result as $row) 
        {
            echo '<div class="research-group">
                    <span>'.$row->title.'</span>';
                    $aux=drupal_get_path_alias("node/".$row->nid);
                    $aux=explode("/", $aux);
                    $leng=count($aux)-1;
                    $id=$aux[$leng];
                    
              echo '<span id="idGrp"> '.$id.'</span>';
              echo '<div id="description">'.substr($row->body_value,0,200).'...</div>';
            echo '  <a id="link" href="/'.$lan.'/'.drupal_get_path_alias("node/".$row->nid).'"></a>
                  </div>';
        }
        
        ?>
  </div>
<?php endif;?>
</article>
<?php if($page):?>
<div class="col-lg-5">

<div class ="col-lg-12 image">
<img width="100%" height="auto" src="<?php echo str_replace("public://","/sites/default/files/",$node->field_imagen_producto["und"][0]["uri"]);?>" alt="<?php echo $node->field_imagen_producto["und"][0]["alt"];?>" title"<?php echo $node->field_imagen_producto["und"][0]["title"];?>" >
<?php //dpm($node->field_imagen_producto); ?>
</div>
  <div class ="col-lg-12 contacto">
    <p><?php echo t("Do you need any further information?");?> </p>

    <form>
      <fieldset> 
      <div class="">
        <input type="text" id="textForm" name="name" placeholder="<?php echo t("Name");?>" required="" >
      </div>
      <div class="">
        <input type="text" id="textForm" name="email" placeholder="Email" required="" >
      </div>
      <div class="">
        <input type="text" id="textForm" name="telephone" placeholder="<?php echo t("Telephone");?>" required="" >
               
      </div>
      <div class="">
       <input type="text" id="textForm" name="subject" placeholder="<?php echo t("Subject");?>" required="" >
               
      </div>
      <div class="">
       <textarea type="text" id="textForm" rows="6" name="message" placeholder="<?php echo t("Message");?>" required="" ></textarea>
               
      </div>
      <div class="checkbox">
        <input id="check_politica" type="checkbox" name="check_politica" required="" class="">
       
       <span class="ng-scope"><?php echo t("I accept the ");?><a ui-sref="static.politica" href="#!/static/politica"><?php echo t("privacy policy");?></a></span>
               
      </div>
     <button type="submit" class="btn btn-default "><?php echo t("Send");?></button>
           
      </fieldset>
    </form>
    
  </div>
</div>
  </div>
</div>

<?php endif; ?>