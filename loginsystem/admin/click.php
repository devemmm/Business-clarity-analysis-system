<style>
  function hideDiv(){
    var closedDiv  = document.getElementById("closableDiv");
    closedDiv.style.display = "none";
  }
</style>
<button id="closableDiv" onClick="hideDiv()"> </button>

<div id="1">A DIV element...</div>
<div id="2">Another DIV element</div>
<div id="3">The third DIV element</div>
<div id="4" onclick="hide()">Click me to hide the other DIVs</div>
<script type="text/javascript">
function hide() {
  document.getElementById("1").hidden = true;
  document.getElementById("2").hidden = true;
  document.getElementById("3").hidden = true;
  document.getElementById("4").hidden = false;
}
</script>