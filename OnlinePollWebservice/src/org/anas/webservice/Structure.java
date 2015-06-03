package org.anas.webservice;

import java.sql.ResultSet;

import java.sql.SQLException;

public class Structure {
	
	public String []coloum;
	public Structure(ResultSet rs)
	{
		int n = 10;
		try{
			n =rs.getMetaData().getColumnCount();
		
		coloum = new String[n+1];
		for(int i = 1 ; i <= n ; i++)
		{
			coloum[i] = rs.getString(i);
		}
		
		}catch (SQLException e){e.printStackTrace();}
	}
	
}
