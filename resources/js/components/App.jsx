import { AppProvider } from '@shopify/polaris';
import { AppBridgeProvider } from '@shopify/app-bridge-react';

const appConfig = {
  apiKey: import.meta.env.VITE_SHOPIFY_API_KEY,
  host: new URLSearchParams(window.location.search).get('host'),
  forceRedirect: true,
};

export default function App() {
  return (
    <AppBridgeProvider config={appConfig}>
      <AppProvider i18n={{}}>
        <h1>Shopify App Ready 🚀</h1>
      </AppProvider>
    </AppBridgeProvider>
  );
}
