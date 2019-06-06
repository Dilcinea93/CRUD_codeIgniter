<header></header>
<aside>
  <sidebar-item v-for="item in items"></sidebar-item>
</aside>
<main>
  <blogpost v-for="post in posts"></blogpost>
</main>
<footer></footer>

<div id="app">
	<child :text="message"></child>
	
  <child :text="message"></child>
</div>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/vue/vue-resource.js"></script>
		
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/prueba.js"></script>
	</body>
