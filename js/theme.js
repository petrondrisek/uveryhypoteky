jQuery(document).ready(function(){
    var actual = 0;
    if(jQuery(".adress-slider p").length > 1)
        setInterval(function(){
            jQuery(".adress-slider p:eq("+actual+")").removeClass("active");
            actual = (actual+1 < jQuery(".adress-slider p").length) ? actual+1 : 0;
            jQuery(".adress-slider p:eq("+actual+")").addClass("active");
        }, 10000);

    jQuery("#range_castka").on('input', function(){
		if(jQuery(this).val() === jQuery(this).attr("max")){
			jQuery("#castka_value").val("Více než " + (jQuery(this).attr("max") / 1000000) + " mil. Kč");
			return false;
		}
		
        if(jQuery(this).val() >= 1000000) jQuery(this).attr("step", "100000");
        else if(jQuery(this).val() >= 200000) jQuery(this).attr("step", "50000"); 
        else if(jQuery(this).val() >= 30000) jQuery(this).attr("step", "10000");
        else if(jQuery(this).val() >= 10000) jQuery(this).attr("step", "5000");
        else jQuery(this).attr("step", "1000");

        if(jQuery(this).val() > 30000 && jQuery(this).val() % 10000 == 1000){
            let set_to = Number(jQuery(this).val())-1000;
            alert(set_to);
            jQuery(this).val(set_to); 
        }

        jQuery("#castka_value").val(Number(jQuery(this).val()).toLocaleString() + " Kč");
    });

    jQuery("#castka_value, input:not(#castka_value)").click(function(){
		if(jQuery("#range_castka").val() === jQuery("#range_castka").attr("max")) jQuery("#castka_value").val("Více než " + (jQuery("#range_castka").attr("max") / 1000000) + " mil. Kč");
        jQuery("#castka_value").val(Number(jQuery("#castka_value").val().replace('Kč', '').replace(/\s/g, '')));
    });

    jQuery("#castka_value").keydown(function(e){
        if(e.keyCode === 13 && jQuery("#range_castka").val() !== jQuery("#range_castka").attr("max")){
            jQuery("#castka_value").val(Number(jQuery("#castka_value").val().replace('Kč', '').replace(/\s/g, '')).toLocaleString() + " Kč");
        }
        if ((e.keyCode < 96 || e.keyCode > 105) && e.keyCode !== 8){
            e.preventDefault();
            return false;
        }
    });

    jQuery("#kontakt").click(function(e){
		if(jQuery("#range_castka").val() === jQuery("#range_castka").attr("max")) return jQuery("#castka_value").val("Více než " + (jQuery("#range_castka").attr("max") / 1000000) + " mil. Kč");
        if(e.target.id !== "castka_value")
            jQuery("#castka_value").val(Number(jQuery("#castka_value").val().replace('Kč', '').replace(/\s/g, '')).toLocaleString() + " Kč");
    });

    jQuery("#castka_value").on('input', function(e){
        if(Number(jQuery(this).val()) < Number(jQuery("#range_castka").attr("min")) /*|| Number(jQuery(this).val()) > Number(jQuery("#range_castka").attr("max"))*/){
            setTimeout(function(){
                alert("Zadaná hodnota musí být vyšší než " + Number(jQuery("#range_castka").attr("min")).toLocaleString() /*+ " až " + Number(jQuery("#range_castka").attr("max")).toLocaleString()*/);
                jQuery("#castka_value, #range_castka").val("1000");
            }, 500);
        }

        jQuery("#range_castka").val(jQuery(this).val());
    });

    jQuery(".wpcf7-form").submit(function(e){
		if(jQuery("#range_castka").val() === jQuery("#range_castka").attr("max")) jQuery("#castka_value").val("Více než " + (jQuery("#range_castka").attr("max") / 1000000) + " mil. Kč");
        else jQuery("#castka_value").val(Number(jQuery("#castka_value").val().replace('Kč', '').replace(/\s/g, '')).toLocaleString() + " Kč");
    });
});