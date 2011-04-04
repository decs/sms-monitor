call $call, {:network => 'SMS'}

msg = "#{$site} is "
msg += case $on
    when 'false' then "back on"
    when 'true' then "off"
end
msg += " air!"

say msg