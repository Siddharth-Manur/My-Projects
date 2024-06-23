package com.thinkconstructive.restdemo.model;

import org.springframework.stereotype.Component;

@Component
public class CloudVendor {
	private String vendorId;
	private String vendorName;
	private String vendorAddress;
	private String vendorPhNo;

	

	public CloudVendor() {
		super();
	}

	public CloudVendor(String vendorId, String vendorName, String vendorAddress, String vendorPhNo)
	{
		super();
		this.vendorId = vendorId;
		this.vendorName = vendorName;
		this.vendorAddress = vendorAddress;
		this.vendorPhNo = vendorPhNo;
		
	}
	
	public String getVendorId() {
		return vendorId;
	}

	public void setVendorId(String vendorId) {
		this.vendorId = vendorId;
	}

	public String getVendorName() {
		return vendorName;
	}

	public void setVendorName(String vendorName) {
		this.vendorName = vendorName;
	}

	public String getVendorAddress() {
		return vendorAddress;
	}

	public void setVendorAddress(String vendorAddress) {
		this.vendorAddress = vendorAddress;
	}

	public String getVendorPhNo() {
		return vendorPhNo;
	}

	public void setVendorPhNo(String vendorPhNo) {
		this.vendorPhNo = vendorPhNo;
	}



}
