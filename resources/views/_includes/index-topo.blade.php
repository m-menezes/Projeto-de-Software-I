<div class="row h-100">
	<div class="container" id="text-topo">
		@if (!Auth::check() && !Auth::guard('org')->check())
		<div class="typewriter">
			<h2 class="typewrite weight-300" data-period="2000" data-type='[ "Tem produtos reciclaveis para doar?", "Não sabe o que fazer com eles?", "Crie sua conta e ajudaremos." ]'>
				<span class="wrap"></span>
			</h2>
		</div>
		<a class="btn btn-outline-success" href="/cadastro/usuario" role="button">Criar Conta</a>
		@else
		<div class="typewriter">
			<h2 class="typewrite weight-300" data-period="2000" data-type='[ "Para proteger o futuro do planeta e conservalo para as proximas geraçoes precisamos reciclar para enconomizar energia e recursos naturais." ]'>
				<span class="wrap"></span>
			</h2>
		</div>
		@endif
	</div>
</div>
@section('script')
var TxtType = function(el, toRotate, period) {
this.toRotate = toRotate;
this.el = el;
this.loopNum = 0;
this.period = parseInt(period, 10) || 2000;
this.txt = '';
this.tick();
this.isDeleting = false;
};

TxtType.prototype.tick = function() {
var i = this.loopNum % this.toRotate.length;
var fullTxt = this.toRotate[i];

if (this.isDeleting) {
this.txt = fullTxt.substring(0, this.txt.length - 1);
} else {
this.txt = fullTxt.substring(0, this.txt.length + 1);
}

this.el.innerHTML = '<span class="wrap">'+this.txt+'</span>';

var that = this;
var delta = 100 - Math.random() * 100;

if (this.isDeleting) { delta /= 2; }

if (!this.isDeleting && this.txt === fullTxt) {
delta = this.period;
this.isDeleting = true;
} else if (this.isDeleting && this.txt === '') {
this.isDeleting = false;
this.loopNum++;
delta = 500;
}

setTimeout(function() {
that.tick();
}, delta);
};''

window.onload = function() {
var elements = document.getElementsByClassName('typewrite');
for (var i=0; i<elements.length; i++) {
var toRotate = elements[i].getAttribute('data-type');
var period = elements[i].getAttribute('data-period');
if (toRotate) {
new TxtType(elements[i], JSON.parse(toRotate), period);
}
}
// INJECT CSS
var css = document.createElement("style");
css.type = "text/css";
css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #000000}";
document.body.appendChild(css);
};
@endsection