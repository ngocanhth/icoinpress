var config = {
  map: {
        "*": {
            "owlslider": "js/owlcarousel/owl.carousel.min",  //khai báo thư viện cần dùng
            // "myCustomWidget": 'KiwiCommerce_LoginAsCustomer/js/kiwicount'
            // owlslider là tên bí danh tự đặt
            // js/owlcarousel/owl.carousel.min      đường dẫn tới thư viện cần gọi
            // * được sử dụng để xác định rằng bạn đang sử dụng một mô-đun mới để sử dụng yêu cầu js, nếu bạn muốn thêm nó vào mô-đun hiện có thì bạn cần phải viết tên mô-đun. được sử dụng để xác định rằng bạn đang sử dụng một mô-đun mới để sử dụng yêu cầu js, nếu bạn muốn thêm nó vào mô-đun hiện có thì bạn cần phải viết tên mô-đun. 
        }
    },
    paths:  {
        "owlslider" : "js/owlcarousel/owl.carousel.min"    
    },
    "shim": {
		"js/owlcarousel/owl.carousel.min": ["jquery"], //Để chạy được owl.carousel phải có jquery
	}
	// deps: [
 //        "Magento_Theme/js/legends",
 //    ]
  
};
 
