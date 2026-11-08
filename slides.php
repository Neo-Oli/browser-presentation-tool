<footer><?= $author; ?> | <?= $title; ?> | <?= $date; ?> | Page <span class="data-pagenum"></span> of <span class="data-totalpages"></span>
</footer>

<section class="title nofooter">
    <h1><?= $title; ?></h1>
    <p><?= $author; ?></p>
    <p><?= $date; ?></p>
</section>


<section><?= md(<<<END
## Contents

- What is Gadgetbridge?
- My odyssey to push and pull custom data from my smartwatch

END); ?></section>
<section><?= md(<<<END
## Gadgetbridge
![Gadgetbridge homepage](<?= img('gadgetbridge-website.png'); ?>){.right}

- FOSS
- Replaces proprietary apps
- All data stays local - requires no internet connection or account
- Works with a ton of existing devices

END); ?>
</section>

<section class="center"><?= md(<<<END
## Available Devices

<strong>679</strong> gadgets are currently known to work with Gadgetbridge!

![Gadgetbridge available devices](<?= img('devicelist.png'); ?>)

END); ?>
</section>


<section><?= md(<<<END
## Devices
<div class="imgrow" markdown="1">
![Gadgetbridge devices](<?= img('gadgetbridge-devices.png'); ?>)
![Gadgetbridge devices](<?= img('gadgetbridge-devices-2.png'); ?>)
</div>
END); ?>
</section>

<section><?= md(<<<END
## Dashboard
<div class="imgrow" markdown="1">
![Gadgetbridge dashboard 1](<?= img('gadgetbridge-dashboard-1.png'); ?>)
![Gadgetbridge dashboard 2](<?= img('gadgetbridge-dashboard-2.png'); ?>)
</div>
END); ?>
</section>

<section><?= md(<<<END
## Workouts
<div class="imgrow" markdown="1">
![Gadgetbridge workouts 1](<?= img('gadgetbridge-workouts-1.png'); ?>)
![Gadgetbridge workouts 2](<?= img('gadgetbridge-workouts-2.png'); ?>)
![Gadgetbridge workouts 3](<?= img('gadgetbridge-workouts-3.png'); ?>)
</div>
END); ?></section>

<section class="title">
    <h1>Story Time</h1>
</section>


<section><?= md(<<<END
## The watchface I've used for many years
<div class="imgrow" markdown="1">
![default watchface](<?= img('watch-default.png'); ?>)
![default watchface](<?= img('watch.jpg'); ?>)
</div>

END); ?></section>

<section><?= md(<<<END
## Weather JSON
```json
    {
    "timestamp": 1794147544,
    "location": "Bern District 3",
    "currentTemp": 283,
    "todayMinTemp": 277,
    "todayMaxTemp": 283,
    "currentHumidity": 68,
    "uvIndex": 1.15,
    "windSpeed": 4.4,
    "windDirection": 235,
    "currentConditionCode": 802,
    "precipProbability": 5,
    "sunRise": 1794118980,
    "sunSet": 1794153840,
    "feelsLikeTemp": 281.34999999999997,
    "isCurrentLocation": 1,
    "forecasts": [
        {
            "maxTemp": 279,
            "minTemp": 282,
            "conditionCode": 500
        },
        {
            "maxTemp": 281,
            "minTemp": 289,
            "conditionCode": 500
        },
```

END); ?></section>

<section><?= md(<<<END
## That city name could be modified
![default watchface](<?= img('watch-location.png'); ?>)
END); ?></section>

<section class="title">
    <h1>How hard can it be to create a custom watch face?</h1>
</section>

<section><?= md(<<<END
## Turns out it's quite simple
![default watchface](<?= img('custom-watchface.png'); ?>){.right}
```js
    const text = hmUI.createWidget(hmUI.widget.TEXT, {
      x: 96,
      y: 120,
      w: 288,
      h: 46,
      color: 0xffffff,
      text_size: 36,
      align_h: hmUI.align.CENTER_H,
      align_v: hmUI.align.CENTER_V,
      text_style: hmUI.text_style.NONE,
      text: 'HELLO ZEPPOS'
    })

```

<div data-order="1" class="exclamation">Location allows 32 characters!</div>

END); ?></section>

<section class="title">
    <h1>Disaster: Xiaomi broke my setup!</h1>
</section>
<section><?= md(<<<END
## Finding an alternative
![ZeppOS Userdata](<?= img('userdata.png'); ?>)

<div data-order="1">
<h3>Two candidates:</h3>
<ul>
    <li>nickName <span class="reversed" data-order="2">❌</span></li>
    <li>device_region <span class="reversed" data-order="3">✅</span> <span class="reversed" data-order="4">allows only 15 characters :(</span></li>
</ul>
</div>
END); ?></section>

<section><?= md(<<<END
## Set device_region via intent

```
am broadcast -a "nodomain.freeyourgadget.gadgetbridge.action.SET_DEVICE_SETTING" \
    -e "device" "\$GADGETBRIDGE_MAC" -e "key" "device_region" -e "value" "\$data" \
    "\$GADGETBRIDGE_NAME"
```

END); ?></section>

<section><?= md(<<<END
## Infinite data with chunking and delta updates

### Delta update
```
2026-11-08_14:00:49.55708 sending data 1:8KnMcKnMcKnM / 5
2026-11-08_14:00:51.47250 sending data 2:KnNTowwqc1Nj / 5
2026-11-08_14:00:51.80513 sending data 3:nMsKnNTjCpzI / 5
2026-11-08_14:00:52.21059 sending data 4:p+KWhOKWhOKW / 5
2026-11-08_14:00:52.67848 sending data 5:qcyOTEx / 5
```

![Watchface with much data](<?= img('now-with-delta.png'); ?>){.right}

### Custom data object
```javascript
    phoneBattery: {
        value: 0,
        key: '9',
        type: 'number'
    },
    infoText: {
        value: 'No info text',
        key: 'a',
        type: 'string',
    },
    media: {
        value: 'Loading media',
        key: 'b',
        type: 'string',
    },
```
END); ?></section>
<section class="title">
    <h1>What about sending commands to the phone?</h1>
</section>
<section><?= md(<<<END
## Sending commands to the phone: Comparatively Easy

<div data-order="1" markdown="1">
### Enable developer settings
![App Logs](<?= img('app-logs.png'); ?>){.small .left}
</div>
<div data-order="2" markdown="1">
### Send data from the watch face
```javascript
console.log(`DROIDDO: next`)
```
</div>
<div data-order="3" markdown="1">
### Receive data on Android
```bash
$ sudo logcat | grep DROIDDO
11-08 17:20:55.854  9771 23800 I n.f.gadgetbridge.service.devices.huami.zeppos.services.ZeppOsLogsService: Log entry - 2026-11-08T17:20:55 [7122832] - DROIDDO: mtoggle
11-08 17:21:02.891  9771 23800 I n.f.gadgetbridge.service.devices.huami.zeppos.services.ZeppOsLogsService: Log entry - 2026-11-08T17:21:02 [7122832] - DROIDDO: mtoggle
11-08 17:21:05.271  9771 23800 I n.f.gadgetbridge.service.devices.huami.zeppos.services.ZeppOsLogsService: Log entry - 2026-11-08T17:21:05 [7122832] - DROIDDO: next
```
</div>

END); ?></section>

<section class="title">
    <h1>Endless possibilities</h1>
</section>

<section><?= md(<<<END
## My main watch screen
![Main Watch screen](<?= img('possibilities-main.png'); ?>)
END); ?></section>

<section><?= md(<<<END
## Buttons
![Media Buttons](<?= img('buttons.png'); ?>)
END); ?></section>

<section><?= md(<<<END
## Calendar
![Calendar](<?= img('calendar.png'); ?>)
END); ?></section>

<section><?= md(<<<END
## Weather
![Weather Screen](<?= img('weather.png'); ?>)
END); ?></section>

<section><?= md(<<<END
## Custom Sensor Data
<div class="imgrow" markdown="1">
![Aranet](<?= img('aranet.png'); ?>)
![Aranet Device](<?= img('aranet-device.jpg'); ?>)
</div>
END); ?></section>

<section><?= md(<<<END
## Tamagotchi
![Tamagotchi](<?= img('tamagotchi.png'); ?>)
END); ?></section>

<section><?= md(<<<END
## Colors
![Colors](<?= img('colors.png'); ?>)
END); ?></section>

<section class="title">
    <h1>That's too much data, now it's really slow!</h1>
</section>

<section><?= md(<<<END
## Remember this slide?
![ZeppOS Userdata](<?= img('userdata.png'); ?>)

<h3>Two candidates:</h3>
<ul>
    <li>nickName ❌ <span class="reversed" data-order="1"><strong>Would allow 127 characters</strong></span></li>
    <li>device_region ✅ allows only 15 characters :(</li>
</ul>
END); ?></section>

<section><?= md(<<<END
## Bugging the developers about it
![Codeberg issue](<?= img('issue.png'); ?>)
END); ?></section>

<section><?= md(<<<END
## The response
![Codeberg response](<?= img('response.png'); ?>)
END); ?></section>

<section class="endslide">
    <h2>The End</h2>
</section>
