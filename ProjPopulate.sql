insert into Bookstore values("COMP353_4Bookstore" , "bookstore@gmail.com");

insert into Book values("12345","title1","author1",1,100.00,0,0,1);
insert into Book values("12346","title2","author1",1,23.45,0,0,2);
insert into Book values("12347","title3","author2",1,150.00,0,0,1);
insert into Book values("12348","title4","author2",1,107.00,0,0,3);
insert into Book values("12349","title5","author3",1,103.00,0,0,2);

insert into Bookstore_employee values("00001","employee1","123456789","1234567890","emp1@store.com");
insert into Bookstore_employee values("00002","employee2","123456788","1234567894","emp2@store.com");
insert into Bookstore_employee values("00003","employee3","123456787","1234567893","emp3@store.com");
insert into Bookstore_employee values("00004","employee4","123456786","1234567892","emp4@store.com");
insert into Bookstore_employee values("00005","employee5","123456785","1234567891","emp5@store.com");

insert into Publisher values(1,"company1","2345678901","pub1@gmail.com");
insert into Publisher values(2,"company2","2345678902","pub2@gmail.com");
insert into Publisher values(3,"company3","2345678903","pub3@gmail.com");

insert into Branch values("Branch11","3456789012",1,"rep11","mgr11","branch1@pub1.com");
insert into Branch values("Branch12","3456789013",1,"rep12","mgr12","branch2@pub1.com");
insert into Branch values("Branch21","3456789014",2,"rep21","mgr21","branch1@pub2.com");
insert into Branch values("Branch22","3456789015",2,"rep22","mgr22","branch2@pub2.com");
insert into Branch values("Branch31","3456789016",3,"rep31","mgr31","branch1@pub3.com");
insert into Branch values("Branch32","3456789017",3,"rep32","mgr32","branch2@pub3.com");

insert into Customer values("cust1@gmail.com","customer1","9763498136");
insert into Customer values("cust2@gmail.com","customer2","9763498137");
insert into Customer values("cust3@gmail.com","customer3","9763498138");
insert into Customer values("cust4@gmail.com","customer4","9763498139");
insert into Customer values("cust5@gmail.com","customer5","9763498130");

insert into Address values("bookstore@gmail.com","qc","43562","montreal","h3h1b8");
insert into Address values("emp1@store.com","qc","12345", "montreal", "h3h2g7");
insert into Address values("emp2@store.com","qc","12346", "montreal", "h3h2g8");
insert into Address values("emp3@store.com","qc","12347", "montreal", "h3h2g9");
insert into Address values("emp4@store.com","qc","12348", "montreal", "h3h2f7");
insert into Address values("emp5@store.com","qc","12349", "montreal", "h3h2e7");
insert into Address values("pub1@gmail.com","qc","12344","montreal","h3f1j8");
insert into Address values("pub2@gmail.com","qc","12334","montreal","h3i1j8");
insert into Address values("pub3@gmail.com","qc","12324","montreal","h3a1j8");
insert into Address values("branch1@pub1.com","qc","12124","montreal","h2a1h7");
insert into Address values("branch2@pub1.com","qc","12134","montreal","h2e1h7");
insert into Address values("branch1@pub2.com","qc","12144","montreal","h2d1h7");
insert into Address values("branch2@pub2.com","qc","12154","montreal","h2c1h7");
insert into Address values("branch1@pub3.com","qc","12164","montreal","h2a1g7");
insert into Address values("branch2@pub3.com","qc","12174","montreal","h2b1h7");
insert into Address values("cust1@gmail.com","qc","12173","montreal","h2b1h8");
insert into Address values("cust2@gmail.com","qc","12172","montreal","h2b1h6");
insert into Address values("cust3@gmail.com","qc","12171","montreal","h2b1h5");
insert into Address values("cust4@gmail.com","qc","12170","montreal","h2b1h3");
insert into Address values("cust5@gmail.com","qc","12179","montreal","h2b1h9");

insert into Orders values("order1","track1","confirm1", '2018-01-01','2018-01-16', 1, "Branch11", "cust1@gmail.com", "00001");
insert into Orderitem values("order1","12345",1);
insert into Orderitem values("order1","12347",2);
insert into Orders values("order2","track2","confirm2", '2018-01-15','2018-01-25', 2, "Branch22", "cust1@gmail.com", "00002");
insert into Orderitem values("order2","12346",1);
insert into Orderitem values("order2","12349",1);
insert into Orders values("order3", "track3","confirm3",'2018-03-05','2018-03-20',3,"Branch31","cust2@gmail.com","00001");
insert into Orderitem values("order3","12348",1);
insert into Orders values("order4","track4","confirm4",'2018-04-20',"NULL",1,"Branch12", "cust3@gmail.com","00003");
insert into Orderitem values("order4","12345",1);
insert into Orders values("order5","track5","confirm5",'2018-05-12',"NULL",2,"Branch21","cust4@gmail.com","00004");
insert into Orderitem values("order5","12346",1);
insert into Orders values("order6","track6","confirm6",'2018-06-17',"NULL",3,"Branch32","cust5@gmail.com","00005");
insert into Orderitem values("order6","12348",1);

insert into Shipment values ("shipment1",'2018-01-10', 1, "00001"); /*received within time*/
insert into Shipmentitem values("shipment1", "12345",1);
update Book set quantity_on_hand = quantity_on_hand + 1 where isbn="12345";
insert into Shipmentitem values("shipment1", "12347",2);
update Book set quantity_on_hand = quantity_on_hand + 2 where isbn="12347";
insert into Shipment values("shipment2", '2018-02-15',2,"00002"); /*received late*/
insert into Shipmentitem values("shipment2", "12346", 1);
update Book set quantity_on_hand = quantity_on_hand + 1 where isbn="12346";
insert into Shipmentitem values("shipment2","12349",1);
update Book set quantity_on_hand = quantity_on_hand + 1 where isbn="12349";
insert into Shipment values("shipment3", '2018-06-06',3,"00001"); /* received late*/
insert into Shipmentitem values("shipment3", "12348",1);
update Book set quantity_on_hand = quantity_on_hand + 1 where isbn="12348";
/* orders 4,5,6 not yet received*/

insert into satisfied_by values ("order1","shipment1");
insert into satisfied_by values("order2","shipment2");
insert into satisfied_by values("order3","shipment3");

insert into Sale values("sale1",'2018-01-11',"cust1@gmail.com","00001");
insert into Saleitem values("sale1","12345",1,100.00);
update Book set quantity_on_hand = quantity_on_hand - 1 where isbn = "12345";
update Book set quantity_sold = quantity_sold + 1 where isbn = "12345";
insert into Saleitem values("sale1","12347",2,150);
update Book set quantity_on_hand = quantity_on_hand - 2 where isbn = "12347";
update Book set quantity_sold = quantity_sold + 2 where isbn = "12347";
insert into Sale values("sale2", '2018-02-17', "cust1@gmail.com", "00002");
insert into Saleitem values("sale2","12346",1,23.45);
update Book set quantity_on_hand = quantity_on_hand - 1 where isbn = "12346";
update Book set quantity_sold = quantity_sold + 1 where isbn = "12346";
insert into Saleitem values("sale2","12349",1,103.00);
update Book set quantity_on_hand = quantity_on_hand - 1 where isbn = "12349";
update Book set quantity_sold = quantity_sold + 1 where isbn = "12349";
insert into Sale values("sale3", '2018-06-07', "cust2@gmail.com","00001");
insert into Saleitem values("sale3","12348",1,107.00);
update Book set quantity_on_hand = quantity_on_hand - 1 where isbn = "12348";
update Book set quantity_sold = quantity_sold + 1 where isbn = "12348";











