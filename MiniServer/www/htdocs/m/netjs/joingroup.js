function(){ $LAB.script("netjs/jquery-1.7.1.min.js")
    .wait()    // 空的wait()只是确保script1在其他代码之前被执行
    .script("netjs/tools.js")
	.wait()// script2 和 script3 依赖于 script1
    .script("netjs/jquery.lazyload.js")
       // 但是script2 和 script3 并不互相依赖,可以并行下载
	.script("netjs/jquery.mobile-1.4.5.min.js")
    .script("netjs/joingroup.js")
}
