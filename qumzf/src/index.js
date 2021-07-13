window.onload = () => {
  const warningEl = document.getElementById('warning');
  const startBtn = document.getElementById('startBtn');
  const stopBtn = document.getElementById('stopBtn');
  const audioToggle = document.getElementById('audioToggle');
  const micAudioToggle = document.getElementById('micAudioToggle');

  if('getDisplayMedia' in navigator.mediaDevices) warningEl.style.display = 'none';

  let blobs;
  let blob;
  let recorder;
  let stream;
  let voiceStream;
  let desktopStream;

  var id = $('#iddd').val();
  var id_dis = $('#id_dis').val();
  var name_link = $('#name_link').val();
  var gr = $('#gr').val();
  var para = $('#para').val();

  var dates = new Date();
  var dd = dates.toJSON().slice(0,10);
  var timeUTC = dates.getTime();

  var fileType = 'video'; // or "audio"
  var fileName = 'ID-'+id+'_'+dd+'_'+timeUTC+'s.webm';  // or "wav"

  const mergeAudioStreams = (desktopStream, voiceStream) => {
    const context = new AudioContext();
    const destination = context.createMediaStreamDestination();
    let hasDesktop = false;
    let hasVoice = false;
    if (desktopStream && desktopStream.getAudioTracks().length > 0) {
      // If you don't want to share Audio from the desktop it should still work with just the voice.
      const source1 = context.createMediaStreamSource(desktopStream);
      const desktopGain = context.createGain();
      desktopGain.gain.value = 0.7;
      source1.connect(desktopGain).connect(destination);
      hasDesktop = true;
    }

    if (voiceStream && voiceStream.getAudioTracks().length > 0) {
      const source2 = context.createMediaStreamSource(voiceStream);
      const voiceGain = context.createGain();
      voiceGain.gain.value = 0.7;
      source2.connect(voiceGain).connect(destination);
      hasVoice = true;
    }

    return (hasDesktop || hasVoice) ? destination.stream.getAudioTracks() : [];
  };

  startBtn.onclick = async () =>{
    const audio = audioToggle.checked || false;
    const mic = micAudioToggle.checked || false;

    desktopStream = await navigator.mediaDevices.getDisplayMedia({ video:true, audio: audio });

    if (mic === true) {
      voiceStream = await navigator.mediaDevices.getUserMedia({ video: false, audio: mic });
    }

    const tracks = [
      ...desktopStream.getVideoTracks(),
      ...mergeAudioStreams(desktopStream, voiceStream)
    ];

    console.log('Tracks to add to stream', tracks);
    stream = new MediaStream(tracks);
    console.log('Stream', stream)

    blobs = [];

    recorder = new MediaRecorder(stream, {mimeType: 'video/webm; codecs=vp8,opus'});
    recorder.ondataavailable = (e) => blobs.push(e.data);
    recorder.onstop = async () => {

      //blobs.push(MediaRecorder.requestData());
      blob = new Blob(blobs, {type: 'video/webm'});

      var formData = new FormData();
      formData.append(fileType + '-filename', fileName);
      formData.append(fileType + '-blob', blob);

      xhr('src/save.php', formData, function (fName) {
        location.reload();
      });

      function xhr(url, data, callback) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
          if (request.readyState === 4 && request.status === 200) {
            callback(location.href + request.responseText);
          }
        };
        request.open('POST', url);
        request.send(data);
      }

      // let url = window.URL.createObjectURL(blob);
      // var download = document.createElement("a");
      // download.href = url;
      // href = download.href;
      // download.setAttribute("download", id + "-" + dd + ".webm");
      // //download.download = 'test.webm';
      // download.style.display = 'block';
      // download.click();
      // window.URL.revokeObjectURL(url);
    };
    startBtn.disabled = true;
    audioToggle.disabled = true;
    micAudioToggle.disabled = true;

    recorder.start();
    stopBtn.disabled = false;

    $.ajax({
      type: "POST",
      url: "../forum/redirection.php",
      data: "id="+id+"&id_dis="+id_dis+"&link="+name_link+"&gr="+gr+"&para="+para,
      dataType: "html",
      cache: false,
      success: function(data) {
        if (data === 'ohhh') {
          window.open(name_link, "_blank");
        }
      }
    });
  }

  stopBtn.onclick = () => {
    audioToggle.disabled = true;
    micAudioToggle.disabled = true;
    startBtn.disabled = false;
    stopBtn.disabled = true;

    recorder.stop();
    stream.getTracks().forEach( track => track.stop() );
    stream = null;

    $.ajax({
      type: "POST",
      url: "../qumzf/src/screen_video.php",
      data: "id="+id+"&id_dis="+id_dis+"&filename="+fileName,
      dataType: "html",
      cache: false,
      success: function(data) {
        if (data === 'yeees') {
          document.location.href="../../index_auth.php";
        }
      }
    });
  };
};