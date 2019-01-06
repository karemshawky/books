var Select2 = {
	init: function() {
        $("#m_select2_1, #m_select2_1_validate").select2({
			placeholder: "أختار القسم"
        }),$("#m_select2_2, #m_select2_2_validate").select2({
			placeholder: "أختار المؤلف"
        }),$("#m_select2_3, #m_select2_3_validate").select2({
			placeholder: "أختار الكلمات المفتاحية"
        })
	}
};
jQuery(document).ready(function() {
	Select2.init()
});