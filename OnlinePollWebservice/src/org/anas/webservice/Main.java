package org.anas.webservice;

import java.util.List;

public class Main {

	public static void main(String[] args) {
		List<Structure> list = new OnlinePoll().select("select * from user_details");
		System.out.println(list.size());

	}

}
