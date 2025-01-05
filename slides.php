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
- Access Termux via USB
- Termux: API
- What am I doing?



END); ?></section>







<section><?= md(<<<END
## What even is Termux?

![Screenshot of Termux](<?= img('termux-screenshot.png'); ?>)

END); ?></section>


<section><?= md(<<<END
## What even is Termux?

<div data-order="1" class="hugeleft" markdown="1">Terminal Emulator</div>
<div data-order="2" markdown="1">
Which pretty good, but boring!
</div>
<div data-order="3" class="hugeleft" markdown="1">Linux Environment</div>
<div data-order="4" markdown="1">
This is the neat thing!
</div>


END); ?></section>


<section><?= md(<<<END

<div class="huge" markdown="1">Install from __F-Droid__ not Google Play for the moment</div>

END); ?></section>






<section><?= md(<<<END
## Installing software
<div data-order="1" class="huge" markdown="1">pkg? apt?</div>


<div data-order="2" class="huge" markdown="1">__apt__, basically</div>

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
## Installing software

### Programming language specific package managers

```bash
~ $ pip install beets
```

```bash
~ $ npm install -g mapscii
```

```bash
~ $ cargo install viu
```

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

<div class="huge" markdown="1">So what is the point? Why not any of the apps that let you install Arch or full Debian?</div>

<div data-order="1" class="huge" markdown="1">Termux: API</div>

END); ?></section>



<section><?= md(<<<END
## Termux: API

### Access device functionality using command line programs

![Screenshot of Termux Notification](<?= img('termux-notification.png'); ?>){.right}

#### Examples:
- Get sensor data
    - battery information
    - gps location
- Create notifications
- Capture a photo
- Enable camera led
- Toggle wifi state
- Change volume
- Get and set clipboard
- List and send sms
- Vibrate the phone

... and more things!

```bash
~ $ termux-battery-status
{
  "health": "GOOD",
  "percentage": 100,
  "plugged": "PLUGGED_USB",
  "status": "FULL",
  "temperature": 34.0,
  "current": -386357
}
```

END); ?></section>



<section><?= md(<<<END

<div class="huge" markdown="1">So what __am__ I doing with Termux?</div>


END); ?></section>



<section><?= md(<<<END
## Using cronjobs to automate all the things

- Set my phone into Do Not Disturb mode automatically
    - set notifcation and call volume to 0
    - Send intents to GadgetBridge to set the watch brightness
- Automatically run `apt update`
- run `rsync` at night to back up all my data
- update my calendars via `vdirsyncer`
- download emails with `isync`.
- update my rss feeds with `newsboat`
- send my gps position as (encrypted!) email to myself

END); ?></section>


<section><?= md(<<<END
## Music
![Screenshot of Termux running ncmpcpp](<?= img('ncmpcpp.png'); ?>){.right}

- Use mpd to play music
- Use ncmpcpp as frontend
- Alternative: use M.A.L.P. - MPD Client or another Android app as frontend
- Use Beets to organize my library

END); ?></section>



<section><?= md(<<<END
## Music
![Screenshot of Termux running ncmpcpp](<?= img('ncmpcpp.png'); ?>){.right}

- Use mpd to play music
- Use ncmpcpp as frontend
- Alternative: use M.A.L.P. - MPD Client or another Android app as frontend
- Use Beets to organize my library

END); ?></section>

<section><?= md(<<<END
## Forward music to another device

### mpd config:

```
audio_output {
    type            "httpd"
    name            "mpdforward"
    encoder         "vorbis"
    port            "8700"
    bind_to_address "127.0.0.1"
    quality         "5.0"
    format          "44100:16:1"
    max_clients     "0"
    enabled         "yes"
}
```

### forward port and start mpv

```bash
~ $ ssh mediacomputer -R localhost:8700:localhost:8700 mpv --cache-pause-wait=3 --no-resume-playback --loop-playlist=force http://127.0.0.1:8700
```

END); ?></section>

<section><?= md(<<<END
## Podcasts


- Use a classic podfetcher and run it as a cronjob
- Play podcasts via mpv

END); ?></section>


<section class="endslide">
    <h2>The End</h2>
</section>
