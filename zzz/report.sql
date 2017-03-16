-- report for audit
select s.id itemno, concat(s.manufacturer,' ',s.model) brand, s.serial, p.description cpu, 
concat(p.speed,'MHz') cpuspeed, 
concat(me.size,'MB') memorysize, concat(d.size, 'MB') hdsize, concat(mo.manufacturer,'/',mo.model,'/',mo.size) monitor,
'N' optical,'N' optical,'' modem,'' `usage`,s.location_suite ccc,s.location_room location,
'HKT Premier' department,s.owner staffid,'User PC' purpose,'' PO,'HK' base,'N' Sunday,'' purchaseon,
s.comments username,s.form_factor remark, s.os_name os, s.last_seen auditdate, s.uuid, s.ip, n.mac
from system s
left join processor p on s.id=p.system_id
left join (SELECT system_id,sum(size) size FROM openaudit.memory group by system_id) me on s.id=me.system_id
left join disk d on s.id=d.system_id
left join monitor mo on s.id =mo.system_id
left join windows w on s.id=w.system_id
left join network n on s.id=n.system_id;

-- update staffinfo (v1)
update system s join windows w
on s.id=w.system_id
set s.owner=substring(w.user_name,1,locate('@',w.user_name)-1);
update system s join uathktp.staff f
on s.owner = f.staffid
set s.comments=f.name,
s.location_suite = f.ccc,
s.location_room = f.location;

-- update staffinfo (v2) 
update system s join 
(select z.id,z.updatetime,date(z.updatetime),curdate(),z.ip,s.name,s.staffid,s.ccc,s.location from 
uathktp.staff s join z_stafflog z on s.staffid=z.staffid where date(z.updatetime) = curdate()) j
on s.ip=j.ip
set s.comments=j.name,
s.owner=j.staffid,
s.location_suite=j.ccc,
s.location_room=j.location
where s.owner=0 and date(s.last_seen)=date(j.updatetime) and date(j.updatetime) = curdate();


-- report to show who did/didn't pc audit
select z.staffid,z.name,s.ip,s.last_seen
from uathktp.staff z left join system s
on z.staffid=s.owner;

staffname = system.comment
staffid = system.owner
ccc = system.location_suite
location = system.location_room
staffname = system.
