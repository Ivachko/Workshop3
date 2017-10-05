package suntzu.snapat;

import android.content.Intent;
import android.net.Uri;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.Window;
import android.view.WindowManager;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class MainActivity extends AppCompatActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        getSupportActionBar().hide(); //<< this

//set content view AFTER ABOVE sequence (to avoid crash)

        WebView webView = (WebView) this .findViewById (R.id.webview);   // synchronization object based on the id


        // Enable javascript
        webView.getSettings().setJavaScriptEnabled(true);

        // Set WebView client
        webView.setWebChromeClient(new WebChromeClient());

        webView.setWebViewClient(new WebViewClient() {

            @Override
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                view.loadUrl(url);
                return true;
            }
        });
        // Load the webpage
        webView.loadUrl("http://workshop.nostradev.com");


    }
}
