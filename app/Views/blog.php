<h1><?= $title ?></h1>


<div>

    <?php foreach($posts as $post) : ?>
        <div>
            <h3><?= $post ?></h3>
            <img src="/assets/images/avatar.png" style="width:200px; height:auto" alt="">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Cum odit quaerat eligendi dolorum ut ipsa commodi eum neque explicabo dignissimos laborum velit culpa corrupti rem, at, ab voluptate corporis officia.</p>
        </div>
    <?php endforeach; ?>


</div>