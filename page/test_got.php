
<script>
  focusScrollMethod = function getFocus() {
    document.getElementById("myButton").focus({preventScroll:false});
  }
  focusNoScrollMethod = function getFocusWithoutScrolling() {
    document.getElementById("myButton").focus({preventScroll:true});
  }
</script>

<button type="button" onclick="focusScrollMethod()">Click me to focus on the button!</button>
<button type="button" onclick="focusNoScrollMethod()">Click me to focus on the button without scrolling!</button>

<div id="container" style="height: 1000px; width: 1000px;">
<button type="button" id="myButton" style="margin-top: 500px;">Click Me!</button>
</div>