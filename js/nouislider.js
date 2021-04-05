

function show_value2(x)
{
 document.getElementById("slider_value2").innerHTML=x;
}
function add_one()
{
  document.f.sld6.value=parseInt(document.f.sld6.value)+1;
  show_value2(document.f.sld6.value);
}
function subtract_one()
{
  document.f.sld6.value=parseInt(document.f.sld6.value)-1;
  show_value2(document.f.sld6.value);
}

  // var slider = document.getElementById('test-slider');
  // noUiSlider.create(slider, {
  //  start: [20, 80],
  //  connect: true,
  //  step: 1,
  //  orientation: 'horizontal', // 'horizontal' or 'vertical'
  //  range: {
  //    'min': 0,
  //    'max': 100
  //  },
  //  format: wNumb({
  //    decimals: 0
  //  })
  // });
  //    