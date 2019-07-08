import * as React from "react";
import { injectIntl, InjectedIntlProps } from "react-intl";
import ProgressTracker from "../ProgressTracker/ProgressTracker";
import { items } from "../ProgressTracker/fixtures/progressItems";
import WorkEnvForm from "./WorkEnvForm";

interface JobBuilderWorkEnvProps {
  handleSubmit: (values) => void;
}

const JobBuilderWorkEnv: React.FunctionComponent<
  JobBuilderWorkEnvProps & InjectedIntlProps
> = ({ handleSubmit }): React.ReactElement => {
  return (
    <section data-c-background="white(100)">
      <ProgressTracker
        items={items}
        backgroundColor="black"
        fontColor="white"
        classNames="manager-jpb-tracker"
        itemsWrapperClassNames="tracker manager-jpb-tracker-wrapper"
      />
      <WorkEnvForm
        handleSubmit={handleSubmit}
        handleModalCancel={(): void => console.log("Modal Cancelled")}
        handleModalConfirm={(): void => console.log("Modal Confirmed")}
      />
    </section>
  );
};

export default injectIntl(JobBuilderWorkEnv);