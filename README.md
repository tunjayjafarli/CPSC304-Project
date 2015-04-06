# CPSC304-Project
Postal Service Database

We used PHP/Apache + MySQL while implementing our database.

The domain that we are modeling is a mailing service domain, the kind of information that is stored in the database of a postal service.

There will be two different interfaces for two classes of users of the system: customers and employees. Each customer will be able to check the status of their sent items and expected delivery date using the TrackingNumber they have received. Customers will have the functionality to change delivery method of a shipment to express/regular if the item has not been mailed yet (waiting in storage). Fee difference will be applied accordingly, and only credit cards can be used for changed delivery methods.  The employees will use the system to send new items (add the information to database), check status of a shipment, access information regarding the shipment (Date sent,ReceiptNumber, TrackingNumber and etc.), and decide what to do with items in storage offices (send, hold).  
 
The specification of the mailing service we are designing stores information about Items(ItemNumber, Fee, Size), Offices (BranchNumber, Name, Location, PhoneNumber),Shipment (IssueNumber, TrackingNumber, Destination), shipmentMehtod(Express,Regular) and Payment (ReceiptNumber, Amount). A shipment will hold information about the item that is being sent, the date that it is being sent on, shipment method and payment. Only Regular Offices can receive the shipment and process it. Storage type offices can only store items. Sent and not picked up items will be forwarded to storages.
