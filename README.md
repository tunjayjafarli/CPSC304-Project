# CPSC304-Project
Postal Service Database

We will be using CSUgrad Oracle Installation and provided PHP/Apache while implementing ourdatabase.

The domain that weare modeling is a mailing service domain, the kind of information that isstored in the database of a postal service.

There will be twodifferent interfaces for two classes of users of the system: customers andemployees. Each customer will be able to check the status of their sent itemsand expected delivery date using the TrackingNumber they have received.Customers will have the functionality to change delivery method of a shipmentto express/regular if the item has not been mailed yet (waiting in storage).Fee difference will be applied accordingly, and only credit cards can be usedfor changed delivery methods.  The employeeswill use the system to send new items (add the information to database), checkstatus of a shipment, access information regarding the shipment (Date sent,ReceiptNumber, TrackingNumber and etc.), and decide what to do with items instorage offices (send, hold).  
 
The specification ofthe mailing service we are designing stores information about Items(ItemNumber, Fee, Size), Offices (BranchNumber, Name, Location, PhoneNumber),Shipment (IssueNumber, TrackingNumber, Destination), shipmentMehtod(Express,Regular) and Payment (ReceiptNumber, Amount). A shipment will hold information about the item that is being sent, thedate that it is being sent on, shipment method and payment. Only RegularOffices can receive the shipment and process it. Storage type offices can onlystore items. Sent and not picked up items will be forwarded to storages.  
 
Expected workdivision: We will all decide about the final form and functionalities of thesystem together. Team member Asif Mammadov will be doing most of the GUI work.Tunjay Jafarli and Rafael Malcolm will be dealing with implementation of systemfunctionalities. Tom Fung will be populating the databases. However, all ofthese is subject to change. If later on we realize that, member X has a lot ofwork to do while member Y has significantly less, the X’s work will be dividedinto smaller parts, and some of the parts will be handed in to Y to complete.This can happen while implementing the functionalities because sometimes theytend to be a lot more complicated than what you expect. We will be holdinggroup meetings to measure our progress, solve the arising issue/problems andhelp each other if necessary.
 
We might needhelp/feedback while using PHP/Apache because every team member is new to theconcepts.
