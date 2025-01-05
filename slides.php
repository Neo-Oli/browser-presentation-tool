<footer><?= $author; ?> | <?= $title; ?> | <?= $date; ?> | Page <span class="data-pagenum"></span> of <span class="data-totalpages"></span>
</footer>

<section class="title nofooter">
    <h1><?= $title; ?></h1>
    <p><?= $author; ?></p>
  2025-01-05  <p><?= $date; ?></p>
</section>
<section><?= md(<<<END
## Agenda
- What even is Termux?
- Installing software
- Service management

END); ?></section>


<section><?= md(<<<END
## Installing software
<div class="center">
<div data-order="1" class="huge" markdown="1">pkg? apt?</div>


<div data-order="2" class="huge" markdown="1">__apt__, basically</div>
</div>

END); ?></section>
<section><?= md(<<<END
## Installing software

### So what does `pkg install` do?

<div data-order="1" markdown="1">
It does 3 things:
- Selecting a working mirror:

`termux-change-repo`
- Updateing package index:

`apt update`

- Installing the requested package

`apt install $@`
</div>

END); ?></section>

<section><?= md(<<<END
## Installing software

### So about installing software?

```bash
~ $ pkg install nano
```


### Or, if you're a pro

```bash
~ $ apt install vim
```

But remember to run `apt update` first and occasionally.

END); ?></section>








<section><?= md(<<<END
<div class="huge" markdown="1">So it is basically __Debian__?</div>
END); ?></section>



<section><?= md(<<<END

<div data-order="1" class="huge" markdown="1">No __systemd__ here!</div>

<div data-order="2" class="huge" markdown="1">Based on __runit__?</div>

END); ?></section>

<section><?= md(<<<END
## Service Management

1. Install termux-services
```bash
~ $ apt install termux-services
```

<div data-order="1" markdown="1">
2. Start the service daemon.
```bash
~ $ service-daemon start
```
Or restart Termux, because the service daemon autostarts
</div>

<div data-order="2" markdown="1">
3. Install a package that provides a service
```bash
~ $ apt install openssh
```
</div>
END); ?></section>













<section><?= md(<<<END
## Service Management

4. Start/stop a service
```bash
~ $ sv up sshd
~ $ sv status sshd
run: sshd: (pid 10436) 14s, normally down; run: log: (pid 27794) 407s
~ $ sv down sshd
```

<div data-order="1" markdown="1">
5. Autostart a service
```bash
~ $ sv-enable sshd
~ $ sv status sshd
run: sshd: (pid 10436) 140s; run: log: (pid 27794) 533s
```
</div>
<div data-order="5" markdown="1">
6. Check log files
```bash
~ $ cat \$LOGDIR/sv/sshd/current
2025-01-05_14:44:47.27061 Server listening on :: port 8022.
2025-01-05_14:44:47.27100 Server listening on 0.0.0.0 port 8022.
```
</div>

END); ?></section>


<section><?= md(<<<END
## Access Termux via USB

<div data-order="1" markdown="1">
1. Enable usb debugging
![picture of usb debugging dialog](<?= img('usb-debugging.png'); ?>){.left}

</div>

<div data-order="1" markdown="1">
2. Install adb
</div>

<div data-order="2" markdown="1">
2. Forward sshd port
```bash
glow@stinkpad:~$ adb forward tcp:8022 tcp:8022
```
</div>
<div data-order="3" markdown="1">
3. Conenct via ssh to local port
```bash
glow@stinkpad:~$ ssh localhost -p 8022
```
</div>

<div data-order="4" markdown="1">
4. Authenticate for the first time
```bash
~ $ passwd
New password:
Retype new password:
New password was successfully set.

```
</div>
END); ?></section>




<section><?= md(<<<END
## A picture

![Example picture of an elephant](<?= img('elephant.jpg'); ?>){.right}

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut dapibus et orci ac auctor. Aenean risus libero, maximus eget sapien at, mollis aliquam dui. Nulla laoreet vehicula lorem non feugiat. Cras eu hendrerit mi, id euismod est. Etiam in ligula finibus, pharetra ligula placerat, aliquam neque. Nulla dapibus pulvinar facilisis. Integer ex orci, pretium quis sem a, sodales sodales nibh. Etiam blandit orci vitae leo fermentum auctor. Vestibulum feugiat tellus quis sollicitudin tincidunt. Ut tincidunt aliquet erat, nec mollis nunc accumsan quis. Sed ac libero vitae eros tempor sollicitudin. In placerat tincidunt dictum. Sed condimentum nulla magna.

END); ?>
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
