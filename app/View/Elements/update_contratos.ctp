<script>
$(document).ready(function(){

<?php Debugger::dump($options);?>
	var items = [
		
		<?php foreach($options as $k => $v) { 
			echo '{ text: "'.$v.'", value: "'.$k.'" },';
		} ?> 
		
	];
	$("#select2").kendoComboBox({
			        dataTextField: "text",
				    dataValueField: "value",
				    dataSource: items,
				    index: 0,
			        suggest: true,
			        filter: 'none'
			    });

});
</script>