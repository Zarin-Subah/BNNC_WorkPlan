<script type='text/javascript'>
    var map = L.map('<?php echo $id;?>').setView([23.91597, 90.197754], <?php echo $zoom;?>);
    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'

    }).addTo(map);
    map.scrollWheelZoom.disable();// disable mouse scroll zoom

<?php
$icon = "";
$icon_color = "";
$completed_at = "";
$icon = "";
$icon_type = "";
foreach ($rows as $row) {
    $org_name = $row['organization_name'];
    $division = $row['division_name'];
    $district = $row['district_name'];
    $lat = $row['latitude'];
    $long = $row['longitude'];
    $organization_type = $row['organization_type'];
    if ($row['score'] > 0) {
        $label_text = "Grade:{$row['grade']}, Score:{$row['score']}";
        $meeting_date = "Meeting Date: {$row['date_of_meeting']}";
    }
    if ($row['grade'] == 'A') {
        $icon = "buysellads";
        $icon_color = "green";
        $icon_class = "my-div-icon-green";
        $label = "bg-info";
    } elseif ($row['grade'] == 'B') {
        $icon = "bold";
        $icon_color = "blue";
        $icon_class = "my-div-icon-blue";
        $label = "bg-info";
    } elseif ($row['grade'] == 'C') {
        $icon = "copyright";
        $icon_color = "orange";
        $icon_class = "my-div-icon-orange";
        $label = "bg-info";
    } else {
        $icon = "circle";
        $icon_color = "red";
        $icon_class = "my-div-icon-red";
        $label = "";
        $label_text = "";
        $meeting_date = "";
    }
    $popupContent = "<b>{$org_name}<br/><small>Type: {$organization_type}<br/>Division: {$division}, District: {$district}<br/>{$meeting_date}</small><center><div class='label {$label}' style='font-size:12px;margin-top:5px;'>{$label_text}</div></center></b>";
    ?>
        var myIcon = L.divIcon({className: '<?php echo $icon_class; ?>'});
        var AwesomeMarker = L.AwesomeMarkers.icon({
            icon: '<?php echo $icon; ?>',
            prefix: 'fa',
            markerColor: '<?php echo $icon_color; ?>',
            spin: false});
    <?php
    if ($organization_type == 'UNCC') {
        $icon_type = 'myIcon';
    } elseif ($organization_type == 'DNCC') {
        $icon_type = 'AwesomeMarker';
    }
    echo "L.marker([$lat, $long], {icon: $icon_type}).addTo(map).bindPopup(\"$popupContent\");\n";
}
?>
</script>