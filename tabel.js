function Load(){
    let sensor = document.getElementById('sensor').value;
    let waarde = document.getElementById('waarde').value;
    let tijd = document.getElementById('tijd').value;

        if(sensor == ''){
          sensor = 'null';
        }
        if(waarde == ''){
          waarde = 'null';
        }
        if(tijd == ''){
          tijd = 'null';
        }

        var xmlhttp = new XMLHttpRequest();
        
        xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.body.innerHTML = this.responseText;
          }
        }

      if(sensor == 'null' && waarde == 'null' && tijd == 'null'){
        alert('Fill in at least 1 search term !');
      }
      else{
        xmlhttp.open("GET","tabel_1_2.php?waarde=" + waarde + "&sensor=" + sensor + "&tijd=" + tijd, true);
        xmlhttp.send();
      }
  }

  function Reload(){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    document.body.innerHTML = this.responseText;}}
    xmlhttp.open("GET","tabel_1_2.php", true);
    xmlhttp.send();
  }