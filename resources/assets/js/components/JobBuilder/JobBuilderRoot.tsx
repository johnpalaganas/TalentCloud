/* eslint-disable @typescript-eslint/explicit-function-return-type */
import React from "react";
import ReactDOM from "react-dom";
import { Routes } from "universal-router";
import { useRouter } from "../../helpers/router";
import JobBuilderIntroPageContainer from "../JobBuilderIntro/JobBuilderIntro";
import RootContainer from "../RootContainer";
import JobDetailsPage from "../JobDetails/JobDetailsPage";
import JobBuilderWorkEnvPage from "../JobBuilderWorkEnv/JobBuilderWorkEnv";
import JobBuilderImpactPage from "../JobBuilderImpact/JobBuilderImpactPage";
import JobTasksPage from "../JobTasks/JobTasksPage";
import JobSkillsPage from "../JobBuilderSkills/JobBuilderSkillsPage";
import JobReviewPage from "../JobReview/JobReviewPage";

const routes: Routes<any, React.ReactElement> = [
  {
    path: "/:locale/manager/jobs",
    children: [
      {
        path: "/builder",
        action: () => <JobBuilderIntroPageContainer jobId={null} />,
      },
      {
        path: "/:id/builder/intro",
        action: ({ params }) => (
          <JobBuilderIntroPageContainer jobId={Number(params.id)} />
        ),
      },
      {
        path: "/:id/builder/details",
        action: ({ params }) => <JobDetailsPage jobId={Number(params.id)} />,
      },
      {
        path: "/:id/builder/environment",
        action: ({ params }) => (
          <JobBuilderWorkEnvPage jobId={Number(params.id)} />
        ),
      },
      {
        path: "/:id/builder/impact",
        action: ({ params }) => (
          <JobBuilderImpactPage jobId={Number(params.id)} />
        ),
      },
      {
        path: "/:id/builder/tasks",
        action: ({ params }) => <JobTasksPage jobId={Number(params.id)} />,
      },
      {
        path: "/:id/builder/skills",
        action: ({ params }) => <JobSkillsPage jobId={Number(params.id)} />,
      },
      {
        path: "/:id/builder/review",
        action: ({ params }) => <JobReviewPage jobId={Number(params.id)} />,
      },
    ],
  },
];

const JobBuilderRoot = (): React.ReactElement | null => {
  const match = useRouter(routes);
  return <RootContainer>{match}</RootContainer>;
};

if (document.getElementById("job-builder-root")) {
  const root = document.getElementById("job-builder-root");
  ReactDOM.render(<JobBuilderRoot />, root);
}
