tinyMCEPopup.requireLangPack();

var Apwot = {
	init : function() {
		getImg = $('#imagename').attr('value');
		
		var brow = tinyMCEPopup.editor;
	},

	insert : function(data) {
		// Insert the contents from the input into the document
		f = $('#someval'+data).attr('value');
		var args = {};
		args.src = f;
		getSize = $('#sizevalue'+data).attr('value');
		getAlign = $('#alignvalue'+data).attr('value');
		args.width = getSize + 'px';
		args.height = getSize + 'px';
		args.align = getAlign;
		
		tinyMCEPopup.editor.execCommand('insertimage', false, args.src);
		oImageElement = getElementByAttributeValue( tinyMCEPopup.editor.contentWindow.document, 'img', 'src', args.src);
		oImageElement.setAttribute('align', args.align);
		oImageElement.setAttribute('width', args.width);
		oImageElement.setAttribute('height', args.height);
		tinyMCEPopup.close();
	},
	
	align : function(data, id) {
		$('#alignvalue' + id).val(data);
	},
	
	imgSize : function(data, id) {
		$('#sizevalue' + id).val(data);
	}
};

tinyMCEPopup.onInit.add(Apwot.init, Apwot);

function getElementByAttributeValue (node, element_name, attrib, value) {
	var elements = getElementsByAttributeValue(node, element_name, attrib, value);
	if (elements.length == 0) {
		return null;
	}
	return elements[0];
};

	//-------------------------------------------------------------------------
	// get elements by attribute value
function getElementsByAttributeValue (node, element_name, attrib, value) {
	var elements = new Array();
	if (node && node.nodeName.toLowerCase() == element_name) {
		
		if (node.getAttribute(attrib) && node.getAttribute(attrib).indexOf(value) != -1) {
			elements[elements.length] = node;
		}
	}

	if (node.hasChildNodes) {
		for (var x=0, n=node.childNodes.length; x<n; x++) {
			var childElements = getElementsByAttributeValue(node.childNodes[x], element_name, attrib, value);
			for (var i=0, m=childElements.length; i<m; i++) {
				elements[elements.length] = childElements[i];
			}
		}
	}
	return elements;
};