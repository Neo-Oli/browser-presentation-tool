<footer><?= $author; ?> | <?= $title; ?> | <?= $date; ?> | Page <span class="data-pagenum"></span> of <span class="data-totalpages"></span>
</footer>

<section class="title nofooter">
    <h1><?= $title; ?></h1>
    <p><?= $author; ?></p>
    <p><?= $date; ?></p>
</section>
<section>
    This is the simplest possible slide
</section>
<section class="slide2">
    This is has alternative formating
</section>
<section class="nofooter">
    This slide has no footer
</section>
<section><?= md(<<<END
## This slide has more formatting

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget nisl sapien. Aliquam sed volutpat ex. Integer augue mauris, scelerisque ac est ac, pharetra auctor nulla. Phasellus vitae sodales leo. Donec eget fringilla mi, et fermentum quam. Nulla pretium vulputate orci, et venenatis diam vehicula eu. Donec malesuada purus eu arcu dignissim luctus. Cras suscipit purus urna. Praesent quis purus sodales, iaculis turpis eget, suscipit dolor. Cras eget eros dapibus, tristique metus quis, suscipit arcu. Donec eget felis ut quam laoreet congue.

END); ?>
</section>
<section><?= md(<<<END
## List
- Item 1
- Item 2
- Item 3
- Item 4
- Item 5
- Item 6
END); ?>
</section>
<section>
        <h2>Animated List</h2>
    <ul>
        <li data-order="1">Item 1</li>
        <li data-order="2">Item 2</li>
        <li data-order="3">Item 3</li>
        <li data-order="5">Item 4, but the fifth to display</li>
        <li data-order="4">Item 5, but the fourth to display</li>
        <li class="replace" data-order="6">Item 6</li>
        <li data-order="7">Item 7, but it replaces item 6</li>
    </ul>
</section>
<section><?= md(<<<END
## A picture

![Example picture of an elephant](<?= img('elephant.jpg'); ?>){.right}

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus et orci ac auctor. Aenean risus libero, maximus eget sapien at, mollis aliquam dui. Nulla laoreet vehicula lorem non feugiat. Cras eu hendrerit mi, id euismod est. Etiam in ligula finibus, pharetra ligula placerat, aliquam neque. Nulla dapibus pulvinar facilisis. Integer ex orci, pretium quis sem a, sodales sodales nibh. Etiam blandit orci vitae leo fermentum auctor. Vestibulum feugiat tellus quis sollicitudin tincidunt. Ut tincidunt aliquet erat, nec mollis nunc accumsan quis. Sed ac libero vitae eros tempor sollicitudin. In placerat tincidunt dictum. Sed condimentum nulla magna.

END); ?>
</section>
<section>
    <h2>A left-aligned picture</h2>
    <img class="left" src="<?= img('elephant.jpg'); ?>" alt="An elephant">
    <p>A quiet moment in the wild.</p>
</section>
<section class="imgrow">
    <h2>Pictures in a row</h2>
    <p>
        <img class="small" src="<?= img('elephant.jpg'); ?>" alt="An elephant, first view">
        <img class="small" src="<?= img('elephant.jpg'); ?>" alt="An elephant, second view">
        <img class="small" src="<?= img('elephant.jpg'); ?>" alt="An elephant, third view">
    </p>
</section>
<section>
    <h2>A compact picture</h2>
    <img class="small left" src="<?= img('elephant.jpg'); ?>" alt="An elephant">
    <ul>
        <li>Elephants communicate through sound and touch.</li>
        <li>Their trunks are used for breathing, drinking, and grasping.</li>
        <li>Family groups care for their young together.</li>
    </ul>
</section>
<section class="center">
    <h2>A moment to pause</h2>
    <img class="small" src="<?= img('elephant.jpg'); ?>" alt="An elephant">
    <p>One picture. One thought.</p>
</section>
<section class="center">
    <h2>Two sides of the story</h2>
    <p><span data-order="1">Room to roam</span></p>
    <p><span class="reversed" data-order="2">A place to return</span></p>
    <img class="small" src="<?= img('elephant.jpg'); ?>" alt="An elephant">
</section>
<section class="center">
    <h2>A memorable takeaway</h2>
    <img class="small" src="<?= img('elephant.jpg'); ?>" alt="An elephant">
    <p class="exclamation">Make room for the big ideas!</p>
</section>
<section><?= md(<<<END
## Responsive Design

Click the edges to navigate on mobile

END); ?>
</section>
<section class="nofooter">
    <img class="fullscreen" src="<?= img('elephant.jpg'); ?>" alt="Example picture of an elephant">
</section>

<section><?= md(<<<END
## Slide with code

```
$ git push origin olis-cool-feature
Username for 'https://github.com': neo-oli
Password for 'https://neo-oli@github.com':
Total 0 (delta 0), reused 0 (delta 0), pack-reused 0 (from 0)
remote:
remote: Create a pull request for 'olis-cool-feature' on GitHub by visiting:
remote:      https://github.com/swissredcross/beispiel-repository/pull/new/olis-cool-feature
remote:
To https://github.com/swissredcross/beispiel-repository.git
 * [new branch]      olis-cool-feature -> olis-cool-feature
$
```

END); ?></section>
<section><?= md(<<<END
## Slide with animated code

<div>
    <pre class="animationcode">
$ git init mein-beispiel-repository
<span data-order="1">Initialized empty Git repository in /home/glow/mein-beispiel-repository/.git/
$ </span><span data-order="2">cd mein-beispiel-repository
$ </span><span data-order="3">pwd
</span><span data-order="4">/home/oli/mein-beispiel-repository
$ </span>
</pre>
</div>

END); ?>
</section>
<section class="endslide">
    <h2>The End</h2>
</section>
