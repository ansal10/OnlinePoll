package org.anas.webservice;


import java.util.List;

import javax.jws.WebMethod;
import javax.jws.WebService;

@WebService(name="OnlinePoll" , targetNamespace="http://www.OnlinePoll.com")
public interface OnlinePollInterface {

	@WebMethod
	public abstract List<Structure> select(String query);

	@WebMethod
	public abstract String update(String query);

}