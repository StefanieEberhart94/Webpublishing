<!--Bild: BioBild in Bio.php-->
<script>
// Get the modal
var modal = document.getElementById('myModal');
// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('BioBild');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!--Bild: MusikGrafik in Musik.php-->
<script>
var modal = document.getElementById('myModal');
var img2 = document.getElementById('MusikGrafik');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img2.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<!--Bild: Zeitung in Event.php-->
<script>
var modal = document.getElementById('myModal');
var img3 = document.getElementById('Zeitung');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img3.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
<!--Bild: Gitarre in Event.php-->
<script>
var modal = document.getElementById('myModal');
var img4 = document.getElementById('Gitarre');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img4.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

<!--Bild: Hochzeit in Events.php-->
<script>
var modal = document.getElementById('myModal');
var img6 = document.getElementById('Hochzeit');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img6.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

