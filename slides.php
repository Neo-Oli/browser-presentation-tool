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
<section>
    <h2>This slide has more formating</h2>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget nisl sapien. Aliquam sed volutpat ex. Integer augue mauris, scelerisque ac est ac, pharetra auctor nulla. Phasellus vitae sodales leo. Donec eget fringilla mi, et fermentum quam. Nulla pretium vulputate orci, et venenatis diam vehicula eu. Donec malesuada purus eu arcu dignissim luctus. Cras suscipit purus urna. Praesent quis purus sodales, iaculis turpis eget, suscipit dolor. Cras eget eros dapibus, tristique metus quis, suscipit arcu. Donec eget felis ut quam laoreet congue. </p>
</section>
<section>
    <header>
        <h2>This slide has a better header</h2>
    </header>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam eget nisl sapien. Aliquam sed volutpat ex. Integer augue mauris, scelerisque ac est ac, pharetra auctor nulla. Phasellus vitae sodales leo. Donec eget fringilla mi, et fermentum quam. Nulla pretium vulputate orci, et venenatis diam vehicula eu. Donec malesuada purus eu arcu dignissim luctus. Cras suscipit purus urna. Praesent quis purus sodales, iaculis turpis eget, suscipit dolor. Cras eget eros dapibus, tristique metus quis, suscipit arcu. Donec eget felis ut quam laoreet congue. </p>
</section>
<section>
    <header>
        <h2>List</h2>
    </header>
    <ul>
        <li>Item 1</li>
        <li>Item 2</li>
        <li>Item 3</li>
        <li>Item 4</li>
        <li>Item 5</li>
        <li>Item 6</li>
    </ul>
</section>
<section>
    <header>
        <h2>Animated List</h2>
    </header>
    <ul>
        <li data-order="1">Item 1</li>
        <li data-order="2">Item 2</li>
        <li data-order="3">Item 3</li>
        <li data-order="5">Item 4, but the fifth to display</li>
        <li data-order="4">Item 5, but the fourth to display</li>
        <li data-order="6">Item 6</li>
    </ul>
</section>
<section>
    <header>
        <h2>A Picture</h2>
    </header>
    <img class="right" src="<?= img('elephant.jpg'); ?>" alt="Example picture of an elephant">
    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus et orci ac auctor. Aenean risus libero, maximus eget sapien at, mollis aliquam dui. Nulla laoreet vehicula lorem non feugiat. Cras eu hendrerit mi, id euismod est. Etiam in ligula finibus, pharetra ligula placerat, aliquam neque. Nulla dapibus pulvinar facilisis. Integer ex orci, pretium quis sem a, sodales sodales nibh. Etiam blandit orci vitae leo fermentum auctor. Vestibulum feugiat tellus quis sollicitudin tincidunt. Ut tincidunt aliquet erat, nec mollis nunc accumsan quis. Sed ac libero vitae eros tempor sollicitudin. In placerat tincidunt dictum. Sed condimentum nulla magna. </p>
</section>
<section>
    <header>
        <h2>Responsive Design</h2>
    </header>
    <p>Click the edges to navigate on mobile</p>
</section>
<section class="nofooter">
    <img class="fullscreen" src="<?= img('elephant.jpg'); ?>" alt="Example picture of an elephant">
</section>
<section class="endslide">
    <h1>The End</h1>
</section>
