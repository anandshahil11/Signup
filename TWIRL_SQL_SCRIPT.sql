
select b.CUSTOMER_PID,b.QFF_NUMBER,a.BILLING_ACCOUNT_NUMBER from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT a,QFF_OWNER.REWARD_CUSTOMER b  where b.CUSTOMER_ID=a.CUSTOMER_ID and b.STATUS='ACCOUNT_LINKED_COMPLETE'



select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER in ('1903830006','1903679775')




select * from properties

select * from FILE_INFO where FILE_NAME like 'MP%'
9/11/2012 2:30pm <= created date < now minus 5 days

createdDate>=Fri Nov 09 14:33:27 EST 2012, 
createdDate<Wed Nov 14 15:55:19 EST 


2013-01-03 00:01:09.283

select count(*) from QFF_OWNER.REWARD_PAYMENT_HISTORY where TRANS_CODE like '%Adj%' and QFF_POINTS_STATUS='PENDING'

select * from QFF_OWNER.REWARD_CUSTOMER where TITLE in ('Miss','MISS','miss','ms','Ms','MS') and EMAIL like '%@gmail.com%' and to_char(DATE_OF_BIRTH,'yyyy-mm-dd')>'1985-03-01' and SUBURB like '%Epp%'


select * from QFF_OWNER.REWARD_CUSTOMER where CUSTOMER_PRN=1400000000000004868

select count(BA_EXTERNAL_ID) from QFF_OWNER.OPTUS_BILLING_ACCOUNT where BA_EXTERNAL_ID NOT IN(select BILLING_ACCOUNT_NUMBER from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT )

select count(BILLING_ACCOUNT_NUMBER) from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where BILLING_ACCOUNT_NUMBER NOT IN(select BA_EXTERNAL_ID from QFF_OWNER.OPTUS_BILLING_ACCOUNT)

select count(*) from QFF_OWNER.OPTUS_BILLING_ACCOUNT where ACCOUNT_ID IN (select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT)


select count(*) from QFF_OWNER.OPTUS_BILLING_ACCOUNT where SEGMENT is null and BA_SYSTEM='ARBOR'

select * from qff_owner.FILE_INFO where FILE_NAME='OPTUS05P.060'


SELECT SUM(QFF_BASE_POINTS),QFF_POINTS_STATUS FROM QFF_OWNER.REWARD_PAYMENT_HISTORY WHERE QANTAS_OUT_FILE_ID=203259 GROUP BY QFF_POINTS_STATUS


select * from qff_owner.FILE_INFO where FILE_NAME='OPTUS05P.063'

SELECT SUM(QFF_BASE_POINTS),SUM(QFF_BONUS_POINTS),QFF_POINTS_STATUS FROM QFF_OWNER.REWARD_PAYMENT_HISTORY WHERE QANTAS_OUT_FILE_ID=214791 GROUP BY QFF_POINTS_STATUS

select * from qff_owner.FILE_INFO where FILE_NAME='OPTUS05P.058'

SELECT SUM(QFF_BASE_POINTS),SUM(QFF_BONUS_POI764NTS),QFF_POINTS_STATUS FROM QFF_OWNER.REWARD_PAYMENT_HISTORY WHERE QANTAS_OUT_FILE_ID=194817 GROUP BY QFF_POINTS_STATUS

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where TRANS_CODE like '%Adj%'

select distinct(service_type) from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where SECURITY_CODE like '%SUCCESS%' 

select count(*) from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where SECURITY_CODE like '%SUCCESS%' and SERVICE_TYPE='OTHER'

select distinct(SERVICE_TYPE) from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT

select distinct(SECURITY_CODE) from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where  SERVICE_TYPE='TELEPHONY'

select * from QFF_OWNER.CR_CUSTOMER_ACCOUNT where CRN=1200000000002490429

select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=4052926

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=276390

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=276390

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID IN (396595,396596,396597)

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where to_char(CREATED_DATE,'ddmmyyyy')='01-09-2011'


update qff_owner.REWARD_CUSTOMER set STATUS='CANCELLED', MODIFIED_DATE=SYSDATE where CUSTOMER_PRN=1400000000000004868

update qff_owner.REWARD_CUSTOMER set STATUS='CANCELLED', MODIFIED_DATE=SYSDATE where CUSTOMER_PRN=1200000000001517308

update qff_owner.REWARD_CUSTOMER set STATUS='CANCELLED', MODIFIED_DATE=SYSDATE where CUSTOMER_PRN=1100000000000031925

update qff_owner.REWARD_CUSTOMER set STATUS='CANCELLED', MODIFIED_DATE=SYSDATE where CUSTOMER_PRN=1400000000000029373

update qff_owner.REWARD_CUSTOMER set QFF_NUMBER=null, QFF_LAST_NAME=null, STATUS='REGISTERED', MODIFIED_DATE=SYSDATE where CUSTOMER_ID=297812;


update QFF_OWNER.OPTUS_BILLING_ACCOUNT set STATUS='INACTIVE',COLLECTION_STATUS='NO',SEGMENT='CONSUMER' where BA_EXTERNAL_ID=87769192000144

update qff_owner.REWARD_CUSTOMER set STATUS='CANCELLED', MODIFIED_DATE=SYSDATE where CUSTOMER_PRN=1400000000000054937

select count(*) from QFF_OWNER.REWARD_CUSTOMER where CUSTOMER_ID in (170800,170824,170841,170842,170847,170848,170892,170968,170977,170978,170979,171054,170808,170821,170890,170891,170897,170900,170939,170945,170958,170975,170994,170996,171033,22387,170816,170822,170857,170934,170935,170940,170951,170952,170956,171056,171059,7075,20131,170806,170807,170864,170871,170910,170911,170920,170942,170955,170989,171036,171047,2634,170804,170814,170820,170867,170915,170917,170924,170960,170974,170982,170986,171042,171055,170809,170811,170876,170894,170933,170970,171014,171018,171057,170819,170825,170859,170899,170906,170931,170967,171032,171039,171050,19534,170833,170838,170849,170863,170878,170887,170907,170909,170973,170980,170988,170991,171000,171019,171020,171049);

 

UPDATE qff_owner.REWARD_CUSTOMER SET STATUS='ACCOUNT_LINKED_COMPLETE' where CUSTOMER_ID in (170800,170824,170841,170842,170847,170848,170892,170968,170977,170978,170979,171054,170808,170821,170890,170891,170897,170900,170939,170945,170958,170975,170994,170996,171033,22387,170816,170822,170857,170934,170935,170940,170951,170952,170956,171056,171059,7075,20131,170806,170807,170864,170871,170910,170911,170920,170942,170955,170989,171036,171047,2634,170804,170814,170820,170867,170915,170917,170924,170960,170974,170982,170986,171042,171055,170809,170811,170876,170894,170933,170970,171014,171018,171057,170819,170825,170859,170899,170906,170931,170967,171032,171039,171050,19534,170833,170838,170849,170863,170878,170887,170907,170909,170973,170980,170988,170991,171000,171019,171020,171049);


update qff_owner.REWARD_CUSTOMER set QFF_NUMBER=null, QFF_LAST_NAME=null, STATUS='REGISTERED', MODIFIED_DATE=SYSDATE where CUSTOMER_ID=280618;



update qff_owner.REWARD_CUSTOMER set STATUS='CANCELLED', MODIFIED_DATE=SYSDATE where CUSTOMER_ID=284660;

---------------------------------

select * from QFF_OWNER.FILE_INFO where FILE_NAME='OPTUS06P.315'

select count(*) from QFF_OWNER.REWARD_PAYMENT_HISTORY where TRANS_CODE like '%Adj%' and QFF_POINTS_STATUS='PENDING'


select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where TRANS_CODE like '%Adj%' and QFF_POINTS_STATUS='PENDING'

select * from QFF_OWNER.REWARD_CUSTOMER where CUSTOMER_ID='266846'

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID='266846'

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID in ('381746','381728')


select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=944898

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=45911


select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=1475446

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=366035

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=366035

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID in ('537012')




select * from QFF_OWNER.FILE_INFO where FILE_NAME in ('OPTUS06P.313','OPTUS06H.313','OPTUS06P.314','OPTUS06H.314')

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY  where QANTAS_OUT_FILE_ID = 691966 and QFF_POINTS_STATUS = 'ACCEPTED'

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY  where QANTAS_OUT_FILE_ID = 693901

update QFF_OWNER.REWARD_PAYMENT_HISTORY set QFF_POINTS_REJECT_CODE = NULL where QANTAS_OUT_FILE_ID = 691966 and QFF_POINTS_STATUS = 'ACCEPTED'


select * from QFF_OWNER.FILE_INFO where FILE_NAME='OPTUS06P.376'

select * from QFF_OWNER.FILE_INFO where FILE_NAME='OPTUS06H.376'

select count(*) from QFF_OWNER.REWARD_PAYMENT_HISTORY  where QANTAS_OUT_FILE_ID = 766711

select count(*) from QFF_OWNER.REWARD_PAYMENT_HISTORY  where QANTAS_OUT_FILE_ID = 771318

select * from QFF_OWNER.FILE_INFO where FILE_ID=771318

select * from QFF_OWNER.FILE_INFO where FILE_NAME='OPTUS06H.381'

select count(*) from QFF_OWNER.REWARD_PAYMENT_HISTORY where QFF_POINTS_STATUS='PENDING'


select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=1077284

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=375396

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID in ('558509','558510','615523')

select * from QFF_OWNER.QRTZ1_FIRED_TRIGGERS

select * from QFF_OWNER.REWARD_CUSTOMER where CUSTOMER_PID='32755881'


select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=82202

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=82202


select * from QFF_OWNER.REWARD_CUSTOMER where CUSTOMER_PID='65629997'


select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=434824

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=434824


select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=8744106

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=256877

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=256877

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID in ('366851','691629')


select * from QFF_OWNER.OPTUS_BILLING_ACCOUNT where BA_EXTERNAL_ID='3136179301'

select * from QFF_OWNER.REWARD_CUSTOMER where CUSTOMER_PID='41044946'

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=246977

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=246977
====================================================================


select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=7733281

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=246977

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=246977 and ACCOUNT_ID=585668

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=246977 and STATUS='PENDING'

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where ACCOUNT_ID in ('585661','585642','585643','585644','585645','585662','585663','585646','585664','585665','585666','585667','585647','585648','585649','585668','585700','585701','585669','585668')

select * from QFF_OWNER.REWARD_AUDIT_NOTE where POINTS_FROM_CUSTOMER_ID=246977

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where ACCOUNT_ID='585668'



select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=720949


select * from QFF_OWNER.OPTUS_BILLING_ACCOUNT where BA_EXTERNAL_ID='93347893000196'



select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=1902563079

select * from QFF_OWNER.FILE_INFO



select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=431330

select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=431330

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID=660573




select * from QFF_OWNER.REWARD_CUSTOMER where QFF_NUMBER=1904287123

select * from QFF_OWNER.REWARD_ACCOUNT_QFF_LINK where CUSTOMER_ID=441673 and ACCOUNT_ID=578383


select * from QFF_OWNER.REWARD_CUSTOMER_ACCOUNT where CUSTOMER_ID=441673

select * from QFF_OWNER.REWARD_PAYMENT_HISTORY where LINK_ID in ('678684','698334')

==========================
Mulyiple link for account iD , Bug in application .. arbor aspc get failed 
========================================================================



select * from qff_owner.REWARD_ACCOUNT_QFF_LINK where ACCOUNT_ID=337724

update qff_owner.REWARD_PAYMENT_HISTORY set LINK_ID = 342306 where LINK_ID in (342305,342260,342306);

delete from qff_owner.REWARD_ACCOUNT_QFF_LINK where LINK_ID in (342305,342260);


 