$(function () {
	var WTAsia = ["in", "mm", "lk", "la", "kh", "id", "tl", "np"];
	var WTOceania = ["nz"];
	var WTAmeC = ["pa", "cr", "ni", "hn", "gt", "mx", "cu", "jm"];
	var WTAmel = ["co", "cl", "py", "bo", "pe"];
	var allWT = ["in", "mm", "lk", "la", "kh", "id", "tl", "np", "nz","pa", "cr", "ni", "hn", "gt", "mx", "cu", "jm", "co", "cl", "py", "bo", "pe"];
	var map;

	map = jQuery('#vmap').vectorMap({
		map: 'world_en',
		hoverOpacity: 0.7,
		selectedColor: '#ff0016',
		backgroundColor: '#1F2A36',
		colors: {in: "#048b9a", mm:"#048b9a", lk:"#048b9a", la:"#048b9a", kh:"#048b9a", id:"#048b9a", tl:"#048b9a", np:"#048b9a", nz:"#318CE7", pa:"#005C96", cr:"#005C96", ni:"#005C96", hn:"#005C96", gt:"#005C96", mx:"#005C96", cu:"#005C96", jm:"#005C96", co:"#007FFF", cl:"#007FFF", py:"#007FFF", bo:"#007FFF", pe:"#007FFF"},
		enableZoom: true,
		showTooltip: true,
		selectedRegions: ["cu"],
		normalizeFunction: 'linear',
		onRegionClick: function(event, code, region){
     // Check if this is an Enabled Region, and not the current selected on
     if(allWT.indexOf(code) === -1 || WTAmeC === code){
     // Not an Enabled Region
     event.preventDefault();
     } else {
     // Enabled Region. Update Newly Selected Region.
      WTAmeC = code;
            }
          },
          onRegionSelect: function(event, code, region){
            console.log(map.selectedRegions);
          },
          onLabelShow: function(event, label, code){
            if(allWT.indexOf(code) === -1){
              event.preventDefault();
            }
          }
        });
      });
		