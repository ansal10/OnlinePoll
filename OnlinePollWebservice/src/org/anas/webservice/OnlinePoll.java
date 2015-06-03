package org.anas.webservice;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.List;

import javax.jws.WebService;

@WebService(endpointInterface="org.anas.webservice.OnlinePollInterface" ,
portName="OnlinePollPort",
serviceName="OnlinePollService")

public class OnlinePoll implements OnlinePollInterface  {
	
	@Override
	public List<Structure> select(String query)
	{
		List<Structure> list = new ArrayList<>();
		ResultSet rs = new Sql().SelectStatement(query);
		//Structure s = new Structure(rs.getMetaData().getColumnCount())
		try{
			while(rs.next())
		
			{
				Structure tmp = new Structure(rs );
				list.add(tmp);
			}
			return list;
		}catch(SQLException e)
		{
			e.printStackTrace();
			return list;
		}
		
	}
	
	@Override
	public String update(String query)
	{
		boolean b = new Sql().UpdateStatement(query);
		if(b) return "true";
		else return "false";
	}

}
